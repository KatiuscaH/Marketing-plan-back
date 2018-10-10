'use strict'
const User = use('App/Models/User')
const { validate } = use('Validator')
class EmpresarioController {
    async index() {
        return await User
            .query()
            .where({ rol: 2 })
    }
    async show({ params }) {
        return await User.find(params.id)
    }
    async store({ request }) {
        const userData = request.only(['name', 'lastname', 'password', 'email', 'periodo', 'year'])
        const rulesUser = {
            name: 'required|string',
            lastname: 'required|string',
            email: 'required|email|unique:users,email',
            password: 'required',
            periodo: 'required|number',
            year: 'required|number'
        }
        const userValidation = await validate(userData, rulesUser)
        if (userValidation.fails()) {
            return { error: userValidation._errorMessages }
        }
        const user = new User()
        user.fill(userData)
        user.rol = 1;
        await user.save()
        return user
    }
}

module.exports = EmpresarioController
