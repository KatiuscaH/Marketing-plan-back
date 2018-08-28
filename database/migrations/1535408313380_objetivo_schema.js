'use strict'

const Schema = use('Schema')

class ObjetivoSchema extends Schema {
  up () {
    this.create('objetivos', (table) => {
      table.increments()
      table.string('nombre').notNullable()
      table.integer('marketing_id').unsigned().notNullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('objetivos')
  }
}
module.exports = ObjetivoSchema
