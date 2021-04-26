const mix = require('laravel-mix');

mix
.copy('quasarapp/dist/spa/index.html', 'resources/views/app.blade.php')
.copyDirectory('quasarapp/dist/spa', 'public');