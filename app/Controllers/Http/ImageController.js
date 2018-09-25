'use strict'
const Helpers = use('Helpers')
const Env = use('Env')
class ImageController {
    async store({ request }) {
        const image = request.file('image', {
            types: ['image'],
            size: '5mb'
        });
        const nombre = new Date().getTime()+image.fileName+'.'+image.subtype;
        await image.move(Helpers.publicPath('uploads/images'),{
            name: nombre
        })
        if (!image.moved()) {
            return profilePic.error()
        }
        return {image: Env.get('APP_URL')+'/uploads/images/'+nombre};
    }
}

module.exports = ImageController
