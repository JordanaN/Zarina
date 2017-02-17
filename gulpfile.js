const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */


elixir(function(mix) {
    mix.styles([
        "normalize.css",
        "font-awesome.min.css",
        "sb-admin.css",
        "../../../node_modules/parsleyjs/src/parsley.css",
        "../../../node_modules/keen-ui/dist/keen-ui.css",

    ]);

    mix.sass('app.scss');
});

// Fonts
gulp.task('fonts', function() {
    return gulp.src([
        'app/node_modules/bootstrap-sass/assets/fonts/bootstrap/glyphicons-halflings-regular.*',
        'app/public/font-awesome/fonts/fontawesome-webfont.*',
    ])
        .pipe(gulp.dest('dist/fonts/'));
});


elixir(function(mix) {
    mix.scripts([
        "../../../node_modules/parsleyjs/dist/parsley.js",
        "../../../node_modules/parsleyjs/dist/i18n/pt-br.js",
        "../../../node_modules/vue/dist/vue.js",
        "../../../node_modules/keen-ui/dist/keen-ui.js",
        "components.js",
        "custon.js"
    ]);
});