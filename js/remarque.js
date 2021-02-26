function Remarques(){
    $.ajax({
        type: "GET",
        url: "/?action=remarques",
        success: function (response) {
             buildRemarques(JSON.parse(response));
        }
    });
}
function buildRemarques(rows){
    $('#rques-body').html('');
    for (let row of rows) {
        let tr = $('<tr></tr>');
        let ens = $('<td></td>').text(row.nom + ' ' + row.prenom);
        let mat = $('<td></td>').text(row.mat);
        let rque = $('<td></td>').text(row.remarque);
        tr.append(ens);
        tr.append(mat);
        tr.append(rque);
        $('#rques-body').append(tr);
    }
}