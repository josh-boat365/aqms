$.selectFromLibrary = function(e, t) { var s = this,
        i = $(e);
    s.settings = $.extend({}, { count: 1, libraryId: "#modal", submitButtonClass: ".sfl-submit", itemContainerClass: ".sfl-item-container", selectedItemClass: ".sfl-selected-item", selectedItemClassActive: ".sfl-selected-item-active", selectedItemImageClass: ".sfl-selected-item-image", selectedItemLabelClass: ".sfl-selected-item-label", selectedItemDeleteClass: ".sfl-delete-item" }, t, i.data()); var n, l, a, c, o, r = s.settings.libraryId.indexOf("#") > -1 ? $(s.settings.libraryId) : $("#" + s.settings.libraryId);

    function d() { n = $(s.settings.itemContainerClass), l = r.find(s.settings.submitButtonClass), a = l.html(), n.each((function() { $(this).find(".custom-control-input").prop("checked", !1), $(this).find(".active").removeClass("active") })), r.modal(r.data()), 1 == s.settings.count ? n.each((function() { $(this).find(".custom-checkbox").css("visibility", "hidden") })) : n.each((function() { $(this).find(".custom-checkbox").css("visibility", "visible") })), l.on("click", f), r.on("change", s.settings.itemContainerClass + " .custom-control-input", m), r.on("hidden.bs.modal", g) }

    function m(e) { if (c = $(s.settings.itemContainerClass + " .custom-control-input:checked").parents(s.settings.itemContainerClass), 1 == s.settings.count) return f(null), void i.css("visibility", "hidden");
        l.html(c.length > 0 ? a + " (" + c.length + ")" : a) }

    function f(e) { e && e.preventDefault(), h(c),
            function() { for (var e, t, n = i.parent().parent(), l = 0; l < o.length; l++)
                    for (var a in e = i.parent().clone().empty(), (t = i.parent().find(s.settings.selectedItemClass).clone()).find(s.settings.selectedItemImageClass).attr("src", o[l].previewPath), t.find(s.settings.selectedItemLabelClass).html(o[l].label), t.css("display", "block"), t.addClass(s.settings.selectedItemClassActive.replace(".", "")), e.append(t), n.prepend(e), t.on("click", s.settings.selectedItemDeleteClass, u), o[l]) t.data(a, o[l][a]) }(), r.modal("hide") }

    function u(e) { e.preventDefault(), $(this).parents(s.settings.selectedItemClass).off("click", s.settings.selectedItemDeleteClass, u), $(this).parents(s.settings.selectedItemClass).parent().remove(), h(i.parent().parent().find(s.settings.selectedItemClassActive)), 1 == s.settings.count && i.css("visibility", "visible") }

    function h(e) { o = [], e && e.each((function() { o.push($(this).data()) })) }

    function g(e) { l.html(a), l.off("click", f), r.off("change", s.settings.itemContainerClass + " .custom-control-input", m), r.off("hidden.bs.modal", g) }
    i.on("click", (function(e) { e.preventDefault(), d() })), s.getData = function() { return o || [] } }, $.fn.selectFromLibrary = function(e) { return this.each((function() { if (null == $(this).data("selectFromLibrary")) { var t = new $.selectFromLibrary(this, e);
            $(this).data("selectFromLibrary", t) } })) };