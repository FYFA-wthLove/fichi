var gulp   = require('gulp'),
    sass   = require('gulp-sass')(require('sass')),
    concat = require('gulp-concat'),
    minify = require('gulp-minify'),
    cssmin = require('gulp-minify-css'),
    plumber = require('gulp-plumber'),
    rename = require("gulp-rename"),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify');

gulp.task('build-css', function() {
    return gulp.src('./src/sass/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(concat('fichi.css'))
        .pipe(gulp.dest('css/'));
});

gulp.task('cssmin', function () {
    return gulp.src('./css/fichi.css')
        .pipe(plumber())
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('css/min'));
});

gulp.task('compress-js', function() {
    gulp.src('./src/js/fichi/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('fail'))
        .pipe(concat('theme.js'))
        .pipe(gulp.dest('js'))
        .pipe(rename('theme.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('js'));
});

gulp.task('watch', function() {
    gulp.watch('./src/sass/**/*.scss', gulp.parallel('build-css'));
    gulp.watch('./css/*.css', gulp.parallel('cssmin'));
});

gulp.task('jsmin', function () {
    gulp.watch('./src/js/fichi/*.js', gulp.parallel('compress-js'));
});

gulp.task('default', gulp.parallel('watch', 'jsmin'));