'use strict'
const User = use('App/Models/User')
const { validate } = use('Validator')
class UserController {
    async index() {
        return await User.all()
    }
    async show({ params }) {
        return await User.find(params.id)
    }
    async store({ request }) {
        const body = request.only(['name', 'lastname', 'password', 'rol', 'email'])
        const rules = {
            name: 'required|string',
            lastname: 'required|string',
            email: 'required|email|unique:users,email',
            rol: 'required',
            password: 'required'
        }
        const validation = await validate(body, rules, {
            'name.required': 'Ingrese el nombre',
            'lastname.required': 'Ingrese apellido',
            'email.required': 'Ingrese email',
            'rol.required': 'Ingrese un rol válido',
            'password.required': 'Ingrese contraseña'
        })
        if (validation.fails()) {
            return { error: validation._errorMessages }
        }
        const user = new User()
        user.fill(body)
        await user.save()
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
module.exports = UserController
