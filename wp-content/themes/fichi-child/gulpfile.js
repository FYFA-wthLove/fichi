var gulp   = require('gulp'),
    sass   = require('gulp-sass')(require('sass')),
    plumber = require('gulp-plumber'),
    sourcemaps = require("gulp-sourcemaps"),
    autoprefixer = require('gulp-autoprefixer'),
    rename = require("gulp-rename"),
    cleanCSS = require('gulp-clean-css'),
    webserver = require('browser-sync'),
    rigger = require('gulp-rigger'),
    uglify = require('gulp-uglify'),
    cache = require('gulp-cache'),
    rimraf = require('gulp-rimraf');

var path = {
    build: {
        js: 'assets/build/js/',
        css: 'assets/build/css/',
    },
    src: {
        js: 'src/js/fichi/*.js',
        style: 'src/sass/*.scss',
    },
    watch: {
        js: 'src/js/fichi/**/*.js',
        css: 'src/sass/**/*.scss',
    },
    clean: './assets/build/*'
};

var config = {
    server: {
        baseDir: './assets/build'
    },
    notify: false
};

gulp.task('webserver', function () {
    webserver(config);
});

gulp.task('css:build', function () {
    return gulp.src(path.src.style)
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(autoprefixer())
        .pipe(gulp.dest(path.build.css))
        .pipe(rename({ suffix: '.min' }))
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(path.build.css))
        .pipe(webserver.reload({ stream: true }));
});

gulp.task('js:build', function () {
    return gulp.src(path.src.js)
        .pipe(plumber())
        .pipe(rigger())
        .pipe(gulp.dest(path.build.js))
        .pipe(rename({ suffix: '.min' }))
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(path.build.js))
        .pipe(webserver.reload({ stream: true }));
});

gulp.task('cache:clear', function () {
    cache.clearAll();
});

gulp.task('clean:build', function () {
    return gulp.src(path.clean, { read: false })
        .pipe(rimraf());
});

gulp.task('build',
    gulp.series('clean:build',
        gulp.parallel(
            'css:build',
            'js:build',
        )
    )
);

gulp.task('watch', function () {
    gulp.watch(path.watch.css, gulp.series('css:build'));
    gulp.watch(path.watch.js, gulp.series('js:build'));
});

gulp.task('default', gulp.series(
    'build',
    gulp.parallel('webserver','watch')
));