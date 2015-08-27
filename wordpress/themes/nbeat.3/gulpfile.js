"use strict";

var gulp    = require("gulp");
var plugins = require("gulp-load-plugins")();
var runSequence = require("run-sequence");

gulp.task("default", ["build"]);
gulp.task("install", ["composer"]);
gulp.task("build", ["copy-assets", "sass"]);

// gulp.task("build", function(callback) {
//     runSequence("clean", ["copy-assets", "sass"], callback);
// });

gulp.task("clean", require("./tasks/clean")(gulp, plugins));
gulp.task("copy-assets", require("./tasks/copy-assets")(gulp, plugins));
gulp.task("sass", require("./tasks/sass")(gulp, plugins));
gulp.task("composer", require("./tasks/composer")(gulp, plugins));
