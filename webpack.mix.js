const { mix } = require('laravel-mix')

mix.disableNotifications()

mix
    // compilation of .js & .vue files, minification for production environments (ES2015 syntax)
    .js('resources/assets/js/app.js', 'public/js')
    // compilation of .scss (sass) files into .css files
    .sass('resources/assets/sass/app.scss', 'public/css')
    .copyDirectory('resources/assets/images', 'public/images')
    .copyDirectory('resources/assets/fonts', 'public/fonts')

// suffixes compiled assets with a unique token to force browsers to load the fresh assets instead of serving stale copies of the code
// versioned files are usually unnecessary in development, so use versioning only in production
if (mix.config.inProduction) {
    mix.version()
}

// BrowserSync automatically monitors files for changes, and injects the changes into the browser without requiring a manual refresh
mix.browserSync({
    proxy: 'localhost:8000',
    open: 'local',
    reloadDelay: 1000,
    reloadThrottle: 1500,
    files: [
        'public/**/*.js',
        'public/**/*.css'
    ]
})
