const gulp = require('gulp');
const sass = require('gulp-sass');
const sync = require('browser-sync');
const ts = require('gulp-typescript');

gulp.task('sass', () => {
	return gulp.src('src/scss/main.scss')
		.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
		.pipe(gulp.dest('assets/css'))
		.pipe(sync.stream());
})

gulp.task('ts', () => {
	return gulp.src(['src/ts/main.ts'])
		.pipe(ts({
			noImplicitAny: true
		}))
		.pipe(gulp.dest('assets/js'))
		.pipe(sync.stream());
})

gulp.task('serve', () => {
	sync.init({
    proxy: "http://aurer.test"
  });

	gulp.watch('src/scss/**/*.scss', ['sass']);
	gulp.watch('src/ts/*.ts', ['ts']);
	gulp.watch(['site/**/*.php']).on('change', sync.reload);
})

gulp.task('default', ['sass', 'ts']);

gulp.task('dev', ['default', 'serve']);
