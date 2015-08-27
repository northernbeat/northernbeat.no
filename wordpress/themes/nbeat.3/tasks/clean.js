module.exports = function(gulp, plugins)
{
    var del = require("del");
    
    return function()
    {
        del(["./build/**/*"]);
    };
};
