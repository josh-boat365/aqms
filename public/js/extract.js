$(function () {
    function E(e) {
        var t = $(e.parents(".question"));
        t.toggleClass("edit-quesiton"), t.toggleClass("view-quesiton");
        var a = t.find(".question-collapse");
        a.hasClass("show") || (a.collapse("toggle"), t.find(".rotate-icon-click").toggleClass("rotate"));
    }
    
    $(document).on("click", ".question .view-button", function () {
        E($(this));
    })
    $(document).on("click", ".question .edit-button", function () {
        E($(this));
    })
    $(document).on("click", ".rotate-icon-click", function () {
        $(this).toggleClass("rotate");
    })
})