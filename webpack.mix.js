const { mix } = require('laravel-mix')

mix.setPublicPath('./public')
mix.disableNotifications()

mix
    // compilation of .js & .vue files, minification for production environments (ES2015 syntax)
    .js('resources/assets/js/app.js', 'js')
    // compilation of .scss (sass) files into .css files
    .sass('resources/assets/sass/app.scss', 'css')

// suffixes compiled assets with a unique token to force browsers to load the fresh assets instead of serving stale copies of the code
// versioned files are usually unnecessary in development, so use versioning only in production
if (mix.config.inProduction) {
    mix.version()
}

// BrowserSync automatically monitors files for changes, and injects the changes into the browser without requiring a manual refresh
// mix.browserSync({
//     proxy: 'localhost:8000',
//     browser: 'google chrome',
//     open: 'local',
//     reloadDelay: 2000,
//     reloadThrottle: 3000,
//     files: [
//         'public/**/*.js',
//         'public/**/*.css'
//     ]
// })
