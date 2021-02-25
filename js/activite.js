function activites(){
    $.ajax({
        type: "GET",
        url: "/?action=activites",
        success: function (response) {
            buildActivites(JSON.parse(response));
        }
    });
}

function buildActivites(rows){
    $('#activite-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let act = $('<td></td>').text(row.activite);
        let date = $('<td></td>').text(row.date);
        let lieu = $('<td></td>').text(row.lieu);
        tr.append(act);
        tr.append(date);
        tr.append(lieu);
        $('#activite-body').append(tr);
    }
}
