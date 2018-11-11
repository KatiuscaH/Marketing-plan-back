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

Route.group(() => {
  /*Rutas para usuario*/
  Route.resource('user', 'UserController').apiOnly()
  /*Rutas de periodo*/
  Route.resource('period', 'PeriodController').apiOnly()
  /* Rutas estudiante */
  Route.resource('student', 'StudentController').apiOnly()
  /* Rutas empresario */
  Route.resource('empresario', 'EmpresarioController').apiOnly()
  /* Rutas marketing */
  Route.resource('marketing', 'MarketingController').apiOnly()
  Route.put('/marketing/:id/presentacion', 'MarketingController.presentacion')
}).prefix('api')
Route.group(() => {
  /*Rutas de autorización*/
  Route.post('/login', 'AuthController.login')
  Route.post('/me', 'AuthController.me')
  Route.post('image', 'ImageController.store')
}).prefix('api')

Route.get('/', ({ request }) => {
  return { greeting: 'Hello world in JSON' }
});