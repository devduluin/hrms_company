(() => {
    var t = document.querySelector("#quick-search"),
        o = tailwind.Modal.getOrCreateInstance(t);
    document.onkeydown = function(e) {
        (e.ctrlKey || e.metaKey) && e.key === "k" && o.show()
    };
    $(t).on("shown.tw.modal", function() {
        $(t).find("input").first()[0].focus()
    });
     
})();