const mix = require('laravel-mix') 
require('vuetifyjs-mix-extension')

// mix.extend('vuetify', new class {
//     webpackConfig (config) {        
//         config.plugins.push(new VuetifyLoaderPlugin())
//     }
// }).vuetify()

mix.vuetify('vuetify-loader', {
    extract: 'css/vuetify-components.css'
})

// web files
mix.js('resources/js/web/app.js', 'public/js/web')
    .js('node_modules/materialize-css/dist/js/materialize.min.js', 'public/js/web')
    .sass('resources/sass/web/app.scss', 'public/css/web')

// rylapp
mix.js('resources/js/rylapp/main.js', 'public/js/rylapp')
    .sass('resources/sass/rylapp/app.scss','public/css/rylapp')    

// mix.sass('resources/sass/app.scss', 'public/css')

// //web files
// mix.js('resources/js/web/app.js', 'public/js/web')
//     .js('resources/js/rylapp/main.js', 'public/js/rylapp')

if (mix.inProduction()) {
    mix.version()
}

