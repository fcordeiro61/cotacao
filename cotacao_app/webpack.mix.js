const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/assets/js")
    .js("resources/js/bootstrap.js", "public/assets/js")
    .js("resources/js/scroll.js", "public/assets/js")
    .css("resources/css/app.css", "public/assets/css")
    .version(); // Adiciona a versão dos arquivos para cache busting
//.sass('resources/sass/app.scss', 'public/css');  // Para Sass, ou use 'styles' para CSS puro
