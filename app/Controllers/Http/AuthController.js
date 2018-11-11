'use strict'
const User = use('App/Models/User')
class AuthController {
    async login({ request, auth }) {
        const { email, password } = request.all()
        return await auth.withRefreshToken().attempt(email, password)
    }

    async me({ request, auth }) {
        var user = await auth.getUser();
        user = await User.query()
            .with('marketing')
            .where('id', user.id)
            .first()
        return user
    }
}

module.exports = AuthController
