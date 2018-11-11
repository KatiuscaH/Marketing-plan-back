'use strict'

const Schema = use('Schema')

class MarketingSchema extends Schema {
  up() {
    this.create('marketings', (table) => {
      table.increments()
      table.string('plan')
      table.json('estudiantes').nullable()
      table.text('presentacion', 'longtext')
      table.text('historia', 'longtext')
      table.text('pest', 'longtext')
      table.text('porter', 'longtext')
      table.text('cuatrop', 'longtext')
      table.text('clientes', 'longtext')
      table.text('competencia', 'longtext')
      table.text('proveedores', 'longtext')
      table.text('bcg', 'longtext')
      table.text('dofa', 'longtext')
      table.text('mefi', 'longtext')
      table.text('ansoff', 'longtext')
      table.timestamps()
    })
  }
  down() {
    this.drop('marketings')
  }
}

module.exports = MarketingSchema
