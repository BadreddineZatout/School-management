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
        $('#next').attr('index', index);
        $('#previous').attr('index', index);
        getArticles(index);
    });
});
function getArticles(index){
    $.ajax({
        type: "GET",
        url: "/?action=articles&index="+index,
        success: function (response) {
            rows = JSON.parse(response);
             if(rows.length > 0){
                buildArticles(rows);
             }else{
                let index = parseInt($('#next').attr('index'));
                index -=1;
                $('#next').attr('index', index);
                $('#previous').attr('index', index);
             }
        }
    });
}
function buildArticles(rows){
    let articles = [];
    articles[0] = rows.slice(0,4);
    articles[1] = rows.slice(4,8);
    $('#a1').html('');
    for(let a of articles[0]){
        $('#a1').append(buildCard(a));
    }
    $('#a2').html('');
    for (let a of articles[1]){
        $('#a2').append(buildCard(a));
    }
}
function buildCard(a){
    let card = $('<div></div>');
    card.addClass('card col-sm-3');
    let img = $('<img>');
    img.attr('src', a.image);
    img.attr('alt', 'card image');
    img.addClass('card-img-top');
    let body = $('<div></div>');
    body.addClass('card-body');
    let h4 = $('<h4></h4>').text(a.titre);
    h4.addClass('card-title');
    if(a.contenu.length>100) a.contenu = a.contenu.slice(0,100) + '...';
    let p = $('<p></p>').text(a.contenu);
    p.addClass('card-text')
    let link = $('<a></a>').text('Afficher la  suite');
    link.addClass('btn');
    link.attr('href', '/?action=article&article='+a.id);
    body.append(h4);
    body.append(p);
    body.append(link);
    card.append(img);
    card.append(body);
    return card;
}