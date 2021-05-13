$(document).ready(function (){
    $('#editer_ajouter').text('Mettre à jour ou Nouveau produit');

//blur : perte de focus
    $('#reference').blur(function() {
        var ref = $(this).val();
        if (ref != '') {
            var parametre = "ref=" + ref;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/ajaxRechercheProduit.php',
                success: function (data) {
                    console.log(data);
                    $('#denomination').val(data[0].nom_produit);
                    if ($('#denomination').val() != '') {
                        $('#editer_ajouter').text('Mettre à jour');
                        $('#action').attr('value', 'editer');
                        $('#id_produit').attr('value', data[0].id_produit);
                    } else {
                        $('#editer_ajouter').text('Insérer');
                        $('#action').attr('value', 'inserer');
                    }
                    $('#description').val(data[0].description);
                    $('#prix').val(data[0].prix);
                    $('#stock').val(data[0].stock);
                }
            });
            $('#reference').click(function () {
                $('#reference').val('');
                $('#denomination').val('');
            })
        }
    });

    $('#recup').blur(function(){
        var recup = $(this).val(); //val = récupération des valeurs dans un formulaire
        alert(recup);
    });

    $('span[id]').click(function(){
        var valeur1 = $.trim($(this).text());
        var ident = $(this).attr("id"); //valeur de l'id
        var name = $(this).attr("name"); //champ à modifier
        $(this).blur(function(){
            var valeur2 = $.trim($(this).text());
            if(valeur1 != valeur2){
                var parametre = 'champ='+name+'&id='+ident+'&nouveau='+valeur2;
                $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: 'text',
                    url: './lib/php/ajax/ajaxUpdateProduit.php',
                    success: function(data){
                        console.log(data);
                    }
                });
            }
        });
    });

    ('span[id]').click(function(){
        var valeur1 = $.trim($(this).text());
        var ident = $(this).attr("id"); //valeur de l'id
        var name = $(this).attr("name"); //champ à modifier
        $(this).blur(function(){
            var valeur2 = $.trim($(this).text());
            if(valeur1 != valeur2){
                var parametre = 'champ='+name+'&id='+ident+'&nouveau='+valeur2;
                $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: 'text',
                    url: './lib/php/ajax/ajaxUpdateClient.php',
                    success: function(data){
                        console.log(data);
                    }
                });
            }
        });
    });
});