module.exports = function(gulp, plugins)
{
    var es  = require("event-stream");
    var header = plugins.wpstylecss();
    var css    = gulp.src("src/sass/nbeat.scss")
                     .pipe(plugins.sass());
    
    return function()
    {
        return es.merge(header, css)
            .pipe(plugins.concat("style.css"))
            .pipe(gulp.dest("build"));
    };
};
