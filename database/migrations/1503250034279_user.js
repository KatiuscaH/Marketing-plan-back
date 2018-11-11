'use strict'

const Schema = use('Schema')

class UserSchema extends Schema {
  up() {
    this.create('users', (table) => {
      table.increments()
      table.string('name', 80).notNullable()
      table.string('lastname', 80).notNullable()
      table.string('email', 80).notNullable().unique()
      table.string('password', 60).notNullable()
      table.integer('rol').notNullable()
      table.integer('year').notNullable()
      table.enu('periodo', [1, 2]).notNullable()
      table.integer('marketing_id').unsigned()
      table.timestamps()
    })
  }
  down() {
    this.drop('users')
  }
}

module.exports = UserSchema