var articles;
$('document').ready(get());
function get(){
    $.ajax({
        type: "GET",
        url: "/?action=getArticle",
        success: function (response) {
            articles = JSON.parse(response);
            buildArticles(articles);
        }
    });
}
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
        maj.append(update_btn(row.id));
        let supp = $('<td></td>');
        supp.append(delete_btn(row.id));
        tr.append(titre);
        tr.append(contenu);
        tr.append(image);
        tr.append(maj);
        tr.append(supp);
        $('#article-body').append(tr);
    }
}

function prepare(id){

}
function prepare_supp(id){
    $('#supp').attr('onclick', 'supp('+id+')');
}
function supp(id){
    $.ajax({
        type: "DELETE",
        url: "/?action=deleteArticle&id="+id,
        success: function (response) {
            get();
        }
    });
}