'use strict'

const Model = use('Model')

class Periodo extends Model {
    users() {
        return this.hasMany('App/Models/User')
    }
}

module.exports = Periodo
