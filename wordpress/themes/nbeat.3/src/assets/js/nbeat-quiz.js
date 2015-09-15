$(document).ready(function() {
    var activePage = 0;
    var maxPage = $(".page").length - 1;

    // setDebugInfo();
    // setPagePadding();
    setActivePage(activePage);

    $("#startQuiz").on("click touchstart", function(e) {
        e.stopPropagation();
        e.preventDefault();
        if (e.handled !== true) {
            $("#quiz-container").get(0).reset();
            goToPage(1);
            e.handled = true;
        } else {
            return false;
        }
    });

    $(".btn-quiz-next").on("click touchstart", function(e) {
        e.stopPropagation();
        e.preventDefault();
        if (e.handled !== true) {
            moveRight();
            e.handled = true;
        } else {
            return false;
        }
    });

    $(".quiz-label").on("click touchstart", function(e) {
        e.stopPropagation();
        e.preventDefault();
        if (e.handled !== true) {
            var forEl = $(this).attr("for");
            $("#" + forEl).prop("checked", true);
            moveRight();
            e.handled = true;
        } else {
            return false;
        }
    });

    $(".btn-quiz-back").on("click touchstart", function(e) {
        e.stopPropagation();
        e.preventDefault();
        if (e.handled !== true) {
            moveLeft();
            e.handled = true;
        } else {
            return false;
        }
    });

    $(".btn-quiz-reset").on("click touchstart", function(e) {
        e.stopPropagation();
        e.preventDefault();
        if (e.handled !== true) {
            $("#quiz-container").get(0).reset();
            goToPage(0);
            e.handled = true;
        } else {
            return false;
        }
    });


    
    function setDebugInfo()
    {
        var _str = "active (" + activePage + "/" + maxPage + ")";

        $(".is-active").attr("data-debug", _str);
    }



    function setPagePadding()
    {
        if ($("#wpadminbar").length > 0) {
            $("#quiz-container .page").each(function() {
                $(this).css("padding-top", "60px");
            });
        }
    }


    
    function goToPage(id)
    {
        console.log("goToPage: " + id);
        var left = "-" + (id * 100) + "vw";

        setActivePage(id);
        $("#quiz-container").css("left", left);
        setDebugInfo();
    }


    
    function setActivePage(id)
    {
        console.log("setActivePage: " + id);
        $("#page-" + activePage).removeClass("is-active");
        $("#page-" + id).addClass("is-active");
        activePage = id;
    }


    
    function moveLeft()
    {
        if (activePage > 0) {
            goToPage(activePage - 1);
        }
    }

    function moveRight()
    {
        if (activePage < maxPage) {
            goToPage(activePage + 1);
        }
    }

    // $(document).keydown(function(e) {
    //     if (e.keyCode == 37) { // left
    //         moveLeft();
    //     }
    //     else if (e.keyCode == 39) { // right
    //         moveRight();
    //     }
    // });


    // function fixVh()
    // {
    //     window.viewportUnitsBuggyfill.init({
    //         refreshDebounceWait: 50,
    //         hacks: window.viewportUnitsBuggyfillHacks
    //     });
    // }
    
    // window.addEventListener('viewport-unit-buggyfill-init', function() {
    //     console.log('getting lost in CSSOM');
    // });
    // window.addEventListener('viewport-unit-buggyfill-style', function() {
    //     console.log('updated rules using viewport unit');
    // });

});
