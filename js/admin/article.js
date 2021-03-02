$('document').ready(function(){
    $.ajax({
        type: "GET",
        url: "/?action=getArticle",
        success: function (response) {
            buildArticles(JSON.parse(response));
        }
    });
});

function buildArticles(rows){
    $('#article-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let titre = $('<td></td>').text(row.titre);
        let contenu = $('<td></td>').text(row.contenu);
        let img = $('<img>');
        img.attr('src', row.image);
        img.attr('height', '300px');
        img.attr('width', '300px');
        let image = $('<td></td>');
        image.append(img);
        let maj = $('<td></td>');
        maj.append(update_btn());
        let supp = $('<td></td>');
        supp.append(delete_btn());
        tr.append(titre);
        tr.append(contenu);
        tr.append(image);
        tr.append(maj);
        tr.append(supp);
        $('#article-body').append(tr);
    }
}