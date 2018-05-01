const gulp = require('gulp');
const sass = require('gulp-sass');
const sync = require('browser-sync');

gulp.task('sass', () => {
	return gulp.src('src/scss/main.scss')
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(gulp.dest('assets/css'))
		.pipe(sync.stream());
})

gulp.task('js', () => {
	return gulp.src(['src/js/main.js'])
		.pipe(gulp.dest('assets/js'))
		.pipe(sync.stream());
})

gulp.task('serve', () => {
	sync.init({
    proxy: "http://aurer.test",
		notify: false
  });

	gulp.watch('src/scss/**/*.scss', ['sass']);
	gulp.watch('src/js/*.js', ['js']);
	gulp.watch(['site/**/*.php']).on('change', sync.reload);
})

gulp.task('default', ['sass', 'js']);
gulp.task('dev', ['default', 'serve']);
