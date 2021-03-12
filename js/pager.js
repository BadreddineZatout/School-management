$(document).ready(function () {
    $('#previous').attr('index', 0);
    $('#next').attr('index', 0);
    $('#previous').bind('click', function () {
        let index = parseInt($('#previous').attr('index'));
        if (index > 0) index -= 1;
        getArticles(index);
        $('#previous').attr('index', index);
        $('#next').attr('index', index);
    });
    $('#next').bind('click', function () {
        let index = parseInt($('#next').attr('index'));
        index +=1;
        getArticles(index);
        $('#next').attr('index', index);
        $('#previous').attr('index', index);
    });
});
function getArticles(index){
    $.ajax({
        type: "GET",
        url: "/?action=articles&index="+index,
        success: function (response) {
            rows = JSON.parse(response);
             if(rows.length > 0){
                // buildArticles(rows);
             }
            
        }
    });
}