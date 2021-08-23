var gulp = require("gulp"),
  concat = require("gulp-concat"),
  uglify = require("gulp-uglify"),
  rename = require("gulp-rename"),
  sass = require("gulp-sass"),
  livereload = require("gulp-livereload");

var config = {
  scripts: [
    // html5 shiv
    //'./js/vendor/modernizr/html5shiv.min.js',
    // SVG Fallback
    //'./js/vendor/svg/svg_fallback.js',
    //jquery
    "./js/vendor/jquery-3.1.1.min.js",
    //slick carousel
    "./js/vendor/slick.min.js",
    "./js/vendor/packery.pkgd.min.js",

    //flexslider
    //"./js/vendor/jquery.flexslider-min.js",
    //fancybox
    //"./js/vendor/jquery.fancybox.min.js",
    //"./js/app/fix.js",
    //"./node_modules/yall-js/dist/yall.js",
    //"./js/app/rocketchat.js",
    "./js/app/main.js"
  ]
};

var theme_name = "template";

function css() {
  return src("./sass/style.scss").rename("style2.ssss").pipe(sass()).pipe(minifyCSS()).pipe(livereload()).pipe(dest("../wp-content/themes/" + theme_name + "/"));
}

function js() {
  return src(config.scripts, { sourcemaps: true }).pipe(concat("scripts.min.js")).pipe(uglify()).pipe(livereload()).pipe(dest("../wp-content/themes/" + theme_name + "/", { sourcemaps: true }));
}

gulp.task("scripts", function () {
  return gulp.src(config.scripts).pipe(concat("scripts.js")).pipe(gulp.dest("../wp-content/themes/" + theme_name + "/")).pipe(rename({ extname: ".min.js" })).pipe(livereload()).pipe(gulp.dest("../wp-content/themes/" + theme_name + "/"));
});

gulp.task("sass", function () {
  return gulp.src("sass/style.scss").pipe(sass.sync({/*outputStyle: "compressed"*/ }).on("error", sass.logError)).pipe(livereload()).pipe(gulp.dest("../wp-content/themes/" + theme_name + "/"));
});

gulp.task("watch", function () {
  livereload.listen(35728);
  gulp.watch("../wp-content/themes/" + theme_name + "/**/*.php").on("change", function (file) {
    livereload.changed(file);
  });
  gulp.watch(["./sass/**/*.scss"], gulp.series("sass"));
  gulp.watch(["./js/**/*.js"], gulp.series("scripts"));
});
gulp.task("default", gulp.series("scripts", "sass", "watch"));
