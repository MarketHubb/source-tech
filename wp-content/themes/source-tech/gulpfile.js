var gulp = require('gulp')
var sass = require('gulp-sass')
var postcss = require('gulp-postcss')
var sourcemaps = require('gulp-sourcemaps')
var autoprefixer = require('autoprefixer')
var input = 'sass/**/*.scss'
var output = './'

gulp.task('sass', function () {
  gulp.src(input)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(sourcemaps.write(output))
    .pipe(gulp.dest(output))
})

gulp.task('default', ['sass'], function () {
  gulp.watch(input, ['sass'])
})
