 // sidebar-open
    $(".sidebar-right-btn").click(function () {
        $(".sidebar-right").addClass("slide-right");
        $(".sidebar-right-btn").addClass("slide-btn");
        $(".logo").addClass("logo-right");
        $(".bg-overlay-page").addClass("slide");
    });

    // sidebar-close
    $(".bg-overlay-page,.sidebar-close-btn").click(function () {
        $(".sidebar-right").removeClass("slide-right");
        $(".sidebar-right-btn").removeClass("slide-btn");
        $(".logo").removeClass("logo-right");
        $(".bg-overlay-page").removeClass("slide");
    });

    // Close button movement
    $(".sidebar-right li a").click(function () {
        $(".sidebar-close-btn").addClass("move");
    });
    $(".sidebar-right li:first-child a").click(function () {
        $(".sidebar-close-btn").removeClass("move");
    });