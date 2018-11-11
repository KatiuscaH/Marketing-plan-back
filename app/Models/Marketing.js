'use strict'

const Model = use('Model')

class Marketing extends Model {

    usuarios() {
        return this.hasMany('App/Models/User')
    }

}

module.exports = Marketing
