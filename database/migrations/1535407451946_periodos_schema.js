'use strict'

const Schema = use('Schema')

class PeriodosSchema extends Schema {
  up () {
    this.create('periodos', (table) => {
      table.increments()
      table.integer('year').notNullable()
      table.integer('period').notNullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('periodos')
  }
}

module.exports = PeriodosSchema
