'use strict'
const User = use('App/Models/User')
const Period = use('App/Models/Periodo')
const { validate } = use('Validator')
class StudentController {
    async index() {
        return await User
            .query()
            .where({ rol: 1 })
            .with('periodo')
            .fetch()
    }
    async show({ params }) {
        return await User.find(params.id)
    }
    async store({ request }) {
        const userData = request.only(['name', 'lastname', 'password', 'email'])
        const periodData = request.only(['period', 'year'])
        const rulesUser = {
            name: 'required|string',
            lastname: 'required|string',
            email: 'required|email|unique:users,email',
            password: 'required',
            year: 'number'
        }
        const rulePeriod = {
            period: 'required|number',
            year: 'required|number'
        }
        const userValidation = await validate(userData, rulesUser)
        const ruleValidation = await validate(periodData, rulePeriod)
        if (userValidation.fails()) {
            return { error: userValidation._errorMessages }
        }
        if (ruleValidation.fails()) {
            return { error: ruleValidation._errorMessages }
        }
        let periodo = await Period.query().where({ year: periodData.year, period: periodData.period }).first()
        if (!periodo) {
            periodo = await Period.create(periodData)
        }
        const user = new User()
        user.fill(userData)
        user.rol = 1;
        await user.periodo().associate(periodo)
        return user
    }
    async update({ params, request }) {
        const user = await User.find(params.id)
        user.merge(request.post())
        await user.save()
        return user
    }
    async destroy({ params }) {
        const user = await User.find(params.id)
        await user.tokens()
            .where('user_id', user.id)
            .delete()
        return await user.delete()
    }
}

module.exports = StudentController
