'use strict'
const Periodo = use('App/Models/Periodo')
const { validate } = use('Validator')
class PeriodoController {
    async index(){
        return await Periodo.all()
    }
    async show({ params }){
        return await Periodo.find(params.id)
    }
    async store({ request }){
        const body = request.only(['year', 'period'])
        const rules = {
            year: 'required|number',
            period: 'required|number'
        }

        const validation = await validate(body, rules)

        if (validation.fails()) {
            return {error: validation._errorMessages}
        }
        const period = new Period();
        period.fill(body);
        await period.save()
        return period;
    }
    async update({ params, request }){
        const periodo = Periodo.find(params.id)
        periodo.merge(request.post())
        await periodo.save()
        return periodo
    }
    async destroy({ params }){
        const period = Period.find(params.id)
        return await period.delete()
    }
}

module.exports = PeriodoController
