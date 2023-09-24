"use strict"; 
/* gulp */
const gulp = require('gulp');
const { src, dest, watch, series, parallel } = require('gulp');

/* sass */
const gulpDartSass  = require('gulp-dart-sass');
const sassGlob      = require('gulp-sass-glob-use-forward');
const autoprefixer  = require('gulp-autoprefixer');
const plumber       = require('gulp-plumber');
const gcmq          = require('gulp-group-css-media-queries');
const sourcemaps    = require('gulp-sourcemaps');

const sass = () => {
    return gulp
        .src('./sass/*.scss')
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err.messageFormatted);
                this.emit('end');
            }
        }))
        .pipe(sourcemaps.init())
        .pipe(sassGlob())
        .pipe(gulpDartSass({
            includePaths: ['./sass'],
            outputStyle: 'expanded'
        }))
        .pipe(autoprefixer({cascade: false,}))
        .pipe(gcmq())
        .pipe(sourcemaps.write('../html/webroot/css'))
        .pipe(gulp.dest('../html/webroot/css'))
}

const watchSass = () => {
watch('./sass/*.scss', series(sass));
}

exports.default = series(sass, watchSass);
