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

elixir(mix => {
    mix.sass('app.scss')
    .webpack('app.js');       
});

elixir(function(mix) {
    mix.styles([
        "sb-admin.css",
        "font-awesome.min.css",
        "normalize.css"
    ]);
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
        'bootstrap.js',
        'jquery.min.js'
    ]);
});
