"use strict";

var gulp = require("gulp");
var plugins = require("gulp-load-plugins")();

gulp.task("default", ["copy-theme", "sass"]);
gulp.task("install", ["composer"]);

gulp.task("clean", require("./tasks/clean")(gulp, plugins));
gulp.task("copy-theme", ["clean"], require("./tasks/copy-theme")(gulp, plugins));
gulp.task("sass", require("./tasks/sass")(gulp, plugins));
gulp.task("composer", require("./tasks/composer")(gulp, plugins));
