function getpage(slug){
    $.ajax({
        url: "http://livetest.local/api/v1/pages/single",
        type : "POST",
        dataType : 'json',
        data : {slug:slug},
        headers: {"Authorization": localStorage.getItem('token')},
        success : function(data) {
            $.each(data['response'], function(i, item) {
                $('.page h1').text(item.title);
                $('.page .content').html(item.content);
            });
        },
        error: function (jqXHR, textStatus, errorThrown){
            console.log(errorThrown);
        }
    });
}