(() => {
    var t = document.querySelector("#quick-search"),
        o = tailwind.Modal.getOrCreateInstance(t);

    $(t).on("shown.tw.modal", function() {
        $(t).find("input").first()[0].focus()
    });
     
})();