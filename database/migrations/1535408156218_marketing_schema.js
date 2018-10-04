'use strict'

const Schema = use('Schema')

class MarketingSchema extends Schema {
  up () {
    this.create('marketings', (table) => {
      table.increments()
      table.string('plan')
      table.json('estudiantes').nullable()
      table.integer('usuario_id').references('id').inTable('users')
      table.integer('empresario_id').references('id').inTable('users')
      table.timestamps()
    })
  }
  down () {
    this.drop('marketings')
  }
}

module.exports = MarketingSchema
