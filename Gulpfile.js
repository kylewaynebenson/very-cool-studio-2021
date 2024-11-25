const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const spawn = require('child_process').spawn;
const rename = require('gulp-rename');
let phpServer;

// Start PHP Server
function startPHP() {
    phpServer = spawn('php', ['-S', 'localhost:8000', 'kirby/router.php'], {
        stdio: 'inherit'
    });
    return Promise.resolve();
}

// Stop PHP server on exit
process.on('exit', () => {
    if (phpServer) phpServer.kill();
});

// Compile and minify SASS
function styles() {
    return gulp.src('source/css/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(cleanCSS())
        .pipe(rename(function(path) {
            path.basename += '-min';
        }))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.stream());
}

// Minify JavaScript
function scripts() {
    return gulp.src(['source/js/**/*.js', '!source/js/**/*-min.js'])
        .pipe(uglify())
        .pipe(rename(function(path) {
            path.basename += '-min';
        }))
        .pipe(gulp.dest('assets/js'))
        .pipe(browserSync.stream());
}

// Watch files and serve with BrowserSync
function serve() {
    browserSync.init({
        proxy: 'localhost:8000',
        port: 3000,
        open: true,
        notify: false
    });

    gulp.watch('source/css/**/*.scss', styles);
    gulp.watch(['source/js/**/*.js', '!source/js/**/*-min.js'], scripts);
    gulp.watch([
        '**/*.php',
        'source/images/**/*',
        'source/icons/**/*'
    ]).on('change', browserSync.reload);
}

// Default task
exports.default = gulp.series(
    startPHP,
    gulp.parallel(styles, scripts),
    serve
); 