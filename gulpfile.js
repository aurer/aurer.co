var server = require('browser-sync');
var gulp = require('gulp');
var less = require('gulp-less');
var plumber = require('gulp-plumber');
var del = require('del');
var run = require('run-sequence');
var debug = require('gulp-debug');
var typescript = require('gulp-typescript');
var LessCleanCSS = require('less-plugin-clean-css');
var cleanCSS = new LessCleanCSS({advanced: true})
var LessAutoprefix = require('less-plugin-autoprefix');
var autoprefix = new LessAutoprefix({ browsers: ['last 2 versions'] });
var imagemin = require('gulp-imagemin');

var src = './assets-src';
var dest = './assets';
var proxy = 'aurer.test';

// Compile less
gulp.task('less', function() {
	return gulp.src([`${src}/less/screen.less`, `${src}/less/print.less`])
		.pipe(plumber())
		.pipe(less({
			plugins: [autoprefix, cleanCSS]
		}))
		.pipe(gulp.dest(`${dest}/css`))
		.pipe(server.stream());
});

// Compile JS
gulp.task('js', function() {
	return gulp.src([`${src}/js/*.ts`])
		.pipe(plumber())
		.pipe(typescript({
    	outFile: 'main.js'
		}))
		.pipe(gulp.dest(`${dest}/js`))
		.pipe(server.stream());
});

// Compress images
gulp.task('imagemin', function() {
	return gulp.src([`${src}/images/*`])
		.pipe(imagemin())
		.pipe(gulp.dest(`${dest}/images`))
})

// Watch for changes
gulp.task('watch', function() {
	gulp.watch(`${src}/less/**/*.less`, ['less']);
	gulp.watch(`${src}/js/**/*.ts`, ['js']);
	gulp.watch(`${src}/images/*`, ['imagemin']);
	gulp.watch('./site/**/*').on('change', server.reload);
});

// Setup local server with injection
gulp.task('serve', function() {
	server.init({
		proxy: proxy
	});
});

// Clean the build folder
gulp.task('clean', function() {
	return del(`${dest}/*`);
});

gulp.task('default', function() {
	run('clean', 'less', 'js', 'imagemin');
});

gulp.task('dev', ['default', 'watch', 'serve']);
