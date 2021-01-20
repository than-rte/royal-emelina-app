const mix = require("laravel-mix")
require("vuetifyjs-mix-extension")

// const VuetifyLoaderPlugin = require("vuetify-loader/lib/plugin");
// mix.extend('vuetify', new class {
//     webpackConfig (config) {
//         config.plugins.push(new VuetifyLoaderPlugin());
//     }
// })

mix.vuetify("vuetify-loader", {
  extract: "css/rylapp/vuetify-components.css"
})

// web files
mix
  .js("resources/js/web/app.js", "public/js/web")
  .js("node_modules/materialize-css/dist/js/materialize.min.js", "public/js/web")
  .sass("resources/sass/web/app.scss", "public/css/web")

// rylapp
mix
  .js("resources/js/rylapp/main.js", "public/js/rylapp")
  .sass("resources/sass/rylapp/app.scss", "public/css/rylapp")
  .copy("resources/js/rylapp/rebuildFunctionalSlots.js.map", "public/js/rylapp")

if (mix.inProduction()) {
  mix.version()
}
