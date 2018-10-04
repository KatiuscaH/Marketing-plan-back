'use strict'

const Schema = use('Schema')

class MarketingSchema extends Schema {
  up () {
    this.create('marketings', (table) => {
      table.increments()
      table.string('plan')
      table.json('estudiantes').nullable()
      table.integer('usuario_id').unsigned().notNullable()
      table.integer('empresario_id').unsigned().notNullable()
      table.timestamps()
    })
  }
  down () {
    this.drop('marketings')
  }
}

module.exports = MarketingSchema
