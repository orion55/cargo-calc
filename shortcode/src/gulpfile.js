var gulp = require('gulp')
var plumber = require('gulp-plumber')
var rename = require('gulp-rename')
var sass = require('gulp-sass')
var autoPrefixer = require('gulp-autoprefixer')
var gcmq = require('gulp-group-css-media-queries')
var cleanCss = require('gulp-clean-css')
var uglify = require('gulp-uglify')
var concat = require('gulp-concat')
var imagemin = require('gulp-imagemin')
var pngquant = require('imagemin-pngquant')
var print = require('gulp-print')
var sassGlob = require('gulp-sass-glob')
var gutil = require('gulp-util')
var ftp = require('vinyl-ftp')
var babel = require('gulp-babel')
var shell = require('gulp-shell')
var runSequence = require('run-sequence')

var docs = '../assets/'
var subfolder = 'css'

gulp.task('sass', function () {
  subfolder = 'css'
  gulp.src(['./css/main.scss'])
    .pipe(plumber({
      handleError: function (err) {
        console.log(err)
        this.emit('end')
      }
    }))
    .pipe(sassGlob())
    .pipe(sass())
    .pipe(autoPrefixer())
    .pipe(gcmq())
    .pipe(concat('main.css'))
    .pipe(gulp.dest(docs + 'css/'))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(cleanCss({level: {1: {specialComments: 0}}}))
    .pipe(gulp.dest(docs + 'css/'))
})

gulp.task('js', function () {
  subfolder = 'js'
  gulp.src(['./js/*.js'])
    .pipe(babel())
    .pipe(concat('main.js'))
    .pipe(gulp.dest(docs + 'js/'))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(uglify())
    .pipe(gulp.dest(docs + 'js/'))
})

gulp.task('images', function () {
  gulp.src(['./img/**/*'])
    .pipe(print())
    .pipe(plumber({
      handleError: function (err) {
        console.log(err)
        this.emit('end')
      }
    }))
    .pipe(imagemin({
      optimizationLevel: 3,
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()],
      interlaced: true
    }))
    .pipe(gulp.dest(docs + 'img/'))
})

gulp.task('fonts', function () {
  return gulp.src('./fonts/**/*.*')
    .pipe(gulp.dest(docs + 'fonts/'))
})

gulp.task('deploy-ftp', function () {

  var conn = ftp.create({
    host: 'masterlg.beget.tech',
    user: 'masterlg',
    password: 'dSmFMsvD',
    parallel: 10,
    log: gutil.log
  })

  const path = '/master-gruzov.ru/public_html/wp-content/plugins/cargo-calc/shortcode/assets/'

  var globs = [
    '../assets/' + subfolder + '/**'
  ]

  conn.rmdir(path + subfolder, function (e) {
    if (e === undefined) {
      return gulp.src(globs, {base: '.', buffer: false})
        .pipe(conn.newer(path)) // only upload newer files
        .pipe(conn.dest(path))
    }
    return console.log(e)
  })
})

gulp.task('vue', function () {
  subfolder = 'js'
  return gulp.src(['./components/*.vue'])
    .pipe(shell('browserify js-vue/main.js -o ../assets/js/build.js'))
})

gulp.task('vue-build', function () {
  subfolder = 'js'
  return gulp.src(['./components/*.vue'])
    .pipe(shell('cross-env NODE_ENV=production browserify -g envify js-vue/main.js | uglifyjs -c warnings=false -m > ../assets/js/build.js'))
})

gulp.task('vue-build-production-task', function () {
  return runSequence('vue-build', 'deploy-ftp')
})

gulp.task('vue-build-task', function () {
  return runSequence('vue', 'deploy-ftp')
})

gulp.task('watch', function () {
  gulp.watch(['./css/**/*.scss', './css/main.scss'], ['sass', 'deploy-ftp'])
  gulp.watch('./js/*.js', ['js', 'deploy-ftp'])
  gulp.watch('./components/*.vue', ['vue-build-task'])
  gulp.watch('./img/**/*', ['images'])
})

gulp.task('default', ['sass', 'js', 'images', 'watch'])
