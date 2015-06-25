module.exports = function(gulp, plugins)
{
    return function()
    {
        return gulp.src("src/theme/**/*").
            pipe(gulp.dest("build"));
    };
};
