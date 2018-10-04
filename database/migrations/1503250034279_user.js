'use strict'

const Schema = use('Schema')

class UserSchema extends Schema {
  up () {
    this.create('users', (table) => {
      table.increments()
      table.string('name', 80).notNullable()
      table.string('lastname', 80).notNullable()
      table.integer('periodos_id', 80).unsigned().notNullable()
      table.string('email', 80).notNullable().unique()
      table.string('password', 60).notNullable()
      table.enu('rol', [0,1,2]).notNullable()
      table.timestamps()
    })
  }
  down () {
    this.drop('users')
  }
}

module.exports = UserSchema