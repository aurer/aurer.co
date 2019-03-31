const gulp = require("gulp");
const server = require("browser-sync");
const sass = require("gulp-sass");
const uglify = require("gulp-uglify");
const plumber = require("gulp-plumber");
const del = require("del");
const fs = require("fs");

const src = "./assets/src";
const dest = "./assets/build";

// Compile scss
function scss(next) {
  gulp
    .src([`${src}/scss/main.scss`])
    .pipe(plumber())
    .pipe(sass())
    .pipe(gulp.dest(`${dest}`))
    .pipe(server.stream());
  next();
}

// Compile javascript
function js(next) {
  gulp
    .src([`${src}/js/main.js`])
    .pipe(plumber())
    .pipe(uglify())
    .pipe(gulp.dest(`${dest}`))
    .pipe(server.stream());
  next();
}

async function gfx(next) {
  await del(`${dest}/gfx/*`);
  gulp.src(`${src}/gfx/*`).pipe(gulp.dest(`${dest}/gfx`));
  next();
}

function autoComponents() {
  ["components", "default", "utility"].forEach(folder => {
    fs.readdir(`${src}/scss/${folder}`, (err, files) => {
      let imports = files
        .filter(file => file != `${folder}.scss`)
        .map(file => {
          return "@import '" + file.replace(".scss", "") + "';";
        })
        .reduce((a, b) => {
          return a + "\n" + b;
        });

      fs.writeFileSync(`${src}/scss/${folder}/${folder}.scss`, imports);
    });
  });
}

// Setup local server with injection
function serve() {
  server.init({
    proxy: "aurer.test",
    notify: false
  });

  watch();
}

function watch() {
  gulp.watch(`${src}/scss/*/*.scss`).on("add", autoComponents);
  gulp.watch(`${src}/scss/*/*.scss`).on("unlink", autoComponents);
  gulp.watch(`${src}/js/**/*.js`, js);
  gulp.watch(`${src}/scss/**/*.scss`, scss);
  gulp.watch(`${src}/gfx/**/*`, gfx);
  gulp.watch("site/templates/**/*", server.reload);
  gulp.watch("content/**/*", server.reload);
}

function compile(next) {
  gulp.parallel(scss, js, gfx);
  next();
}

exports.default = gulp.parallel(compile);
exports.start = gulp.parallel(compile, serve);
exports.watch = watch;
exports.gfx = gfx;
