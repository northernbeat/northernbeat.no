"use strict";

var gulp = require("gulp");
var plugins = require("gulp-load-plugins")();

gulp.task('default', ["sass"]);
gulp.task("sass", require("./tasks/sass")(gulp, plugins));
