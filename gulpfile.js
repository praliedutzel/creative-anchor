// Include gulp
var gulp = require('gulp');

// Include plugins
var jshint = require('gulp-jshint');
var minify = require('gulp-minify');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var svgsprite = require('gulp-svg-sprite');
var imagemin = require('gulp-imagemin');
var cache = require('gulp-cache');

// Setup configuration options for gulp-svg-sprite
var svgconfig = {
    'dest': 'img',
    'shape': {
        'dimension': {
            'maxWidth': 32,
            'maxHeight': 32
        }
    },
    'mode': {
        'defs': {
            'dest': '',
            'sprite': 'spritemap.svg'
        }
    }
};

// Lint and minify JS
gulp.task('scripts', function() {
   return gulp
      // Check for JS errors on my scripts only
      .src('js/script.js')
      .pipe(jshint())
      // Report errors
      .pipe(jshint.reporter('default'))
      .pipe(minify())
      .pipe(gulp.dest('js'))
});

// Styles
gulp.task('styles', function() {
   return gulp
      // Find all Sass files
      .src('scss/**/*.scss')
      // Run Sass and print errors to console
      .pipe(sass({includePaths: ['_/scss/'], outputStyle: 'compressed'}).on('error', sass.logError))
      // Run AutoPrefixer
      .pipe(autoprefixer())
      // Write to CSS
      .pipe(gulp.dest('css'));
});

// SVGs
gulp.task('svgs', function() {
   return gulp
      // Find all SVG files
      .src('img/svg/*.svg')
      // Combine all SVGs into a single sprite
      .pipe(svgsprite(svgconfig))
      // Output final SVG sprite
      .pipe(gulp.dest('img'));
});

// Images
gulp.task('images', function() {
   return gulp.src('img/assets/**/*')
      .pipe(cache(imagemin({ optimizationLevel: 5, progressive: true, interlaced: true })))
      .pipe(gulp.dest('img/optimized-assets'));
});

// Watch for file changes
gulp.task('watch', function() {
   gulp.watch('js/script.js', ['scripts']);
   gulp.watch('scss/**/*.scss', ['styles']);
   gulp.watch('img/svg/*.svg', ['svgs']);
   gulp.watch('img/assets/**/*', ['images']);
   // Log changes in the console
   return gulp
   .on('change', function(event) {
      console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
   });
});

gulp.task('default', ['scripts', 'styles', 'svgs', 'images', 'watch']);
