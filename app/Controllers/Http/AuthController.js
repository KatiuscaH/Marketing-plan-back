'use strict'

class AuthController {
    async login({ request, auth }){
        const { email, password } = request.all()
        return await auth.withRefreshToken().attempt(email, password)
    }
    
    async me({request, auth}){
        try{
            return await auth.getUser();
        }catch (err){
            return {'err': err}
        }
    }
}

module.exports = AuthController
