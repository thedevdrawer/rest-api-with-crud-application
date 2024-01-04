(function($) {
    auth();
    listpages();
})(jQuery);

function auth(){
    $.ajax({
        url: "http://livetest.local/api/v1/pages/auth",
        type : "POST",
        success : function(data) { 
            localStorage.setItem('token', data.token);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log(errorThrown);
        }
    });
}

function listpages(){
    var pages = [];
    $.ajax({
        url: "http://livetest.local/api/v1/pages/read",
        type : "GET",
        dataType : 'json',
        headers: {"Authorization": localStorage.getItem('token')},
        success : function(data) { 
            $.each(data['response'], function(i, item) {
                $('.navbar-nav').append('<li class="nav-item"><a class="nav-link" href="#/' + item.slug + '">' + item.title + '</a></li>');
                pages.push(item.slug);
            });
            getPages(pages);
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log(errorThrown);
        }
    });
}

function getPages(pages) {
    var app = $.sammy('#app', function() {
        this.get('#/*', function(context) {
            $('.navbar-collapse').removeClass('show');
            var str=location.href.toLowerCase();
            context.app.swap('');
            context.render('pages/home.template', {})
                .appendTo(context.$element());
        });
        this.get('#/:slug', function(context) {
            $('.navbar-collapse').removeClass('show');
            var str=location.href.toLowerCase();
            context.app.swap('');
            context.render('pages/' + this.params['slug'] + '.template', {})
                .appendTo(context.$element());
        });

        this.before('.*', function() {
            var hash = document.location.hash;
            $("nav li").find("a").removeClass("current");
            $("nav li").find("a[href='"+hash+"']").addClass("current");
            });
    });
    app.run('#/');
}