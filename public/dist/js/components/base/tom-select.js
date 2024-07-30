function initializeTomSelect() {
    (function() {
        "use strict";
        $(".tom-select").each(function() {
            let title = $(this).data('title');
            let url = $(this).data('url');
            let e = {
                plugins: {
                    dropdown_input: {}
                },
                create: true,
                render:{
                    
                    option_create: function(data, escape) {
                        if(url){
                            return '<div class="create" onclick="window.location.href=\'' + url + '?item='+encodeURIComponent(data.input)+'\'"> + Add '+title+' <strong>' + escape(data.input) + '</strong> </div>';
                        }
                    },
                    no_results:function(data,escape){
                        if(url){
                            return '';
                        }
                    }
                }
            };
            $(this).data("placeholder") && (e.placeholder = $(this).data("placeholder")), $(this).attr("multiple") !== void 0 && (e = {
                ...e,
                plugins: {
                    ...e.plugins,
                    remove_button: {
                        title: "Remove this item"
                    }
                },
                persist: !1,
                create: !0,
                onDelete: function(t) {
                    return confirm(t.length > 1 ? "Are you sure you want to remove these " + t.length + " items?" : 'Are you sure you want to remove "' + t[0] + '"?')
                }
            }), $(this).data("header") && (e = {
                ...e,
                plugins: {
                    ...e.plugins,
                    dropdown_header: {
                        title: $(this).data("header")
                    }
                }
            }), new TomSelect(this, e)
        })
    })();
}

window.initializeTomSelect = initializeTomSelect;