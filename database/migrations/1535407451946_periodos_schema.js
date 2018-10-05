'use strict'

const Schema = use('Schema')

class PeriodosSchema extends Schema {
  up () {
    this.create('periodos', (table) => {
      table.increments()
      table.integer('year').notNullable()
      table.enum('period', [1,2]).notNullable()
      table.timestamps()
    })
  }

  down () {
    this.drop('periodos')
  }
}

module.exports = PeriodosSchema
