'use strict'

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Http routes are entry points to your web application. You can create
| routes for different URL's and bind Controller actions to them.
|
| A complete guide on routing is available here.
| http://adonisjs.com/docs/4.0/routing
|
*/
const Estrategias = use('App/Models/Estrategia')
const Route = use('Route')

Route
  .group(() => {
    Route.get('users', 'UserController.findAll')
    Route.get('user/:id', 'UserController.findOne')
    Route.post('users', 'UserController.create')
    Route.put('user/:id', 'UserController.update')
    Route.post('/login', 'AuthController.login')
  })
  .prefix('api/v1')

Route.get('/', ({ request }) => {
  return { greeting: 'Hello world in JSON' }
});