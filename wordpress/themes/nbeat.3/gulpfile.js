"use strict";

var gulp = require("gulp");
var plugins = require("gulp-load-plugins")();

gulp.task('default', ["clean", "copy-theme", "sass"]);
gulp.task("clean", require("./tasks/clean")(gulp, plugins));
gulp.task("copy-theme", require("./tasks/copy-theme")(gulp, plugins));
gulp.task("sass", require("./tasks/sass")(gulp, plugins));
