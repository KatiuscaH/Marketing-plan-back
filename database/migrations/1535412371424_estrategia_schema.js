'use strict'

const Schema = use('Schema')

class EstrategiaSchema extends Schema {
  up () {
    this.create('estrategias', (table) => {
      table.increments()
      table.string('nombre').notNullable()
      table.integer('precio').notNullable()
      table.string('estado')
      table.integer('tiempo')
      table.integer('objetivo_id').unsigned().notNullable()
      table.timestamps()
    })
  }
  down () {
    this.drop('estrategias')
  }
}

module.exports = EstrategiaSchema
