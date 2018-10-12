'use strict'

const Model = use('Model')

class Marketing extends Model {
    user() {
        return this.belongsTo('App/Models/User')
    }
}

module.exports = Marketing
