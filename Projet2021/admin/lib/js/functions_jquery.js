$(document).ready(function () {

    $('#reference').blur(function(){
        var ref = $(this).val();
        if(ref != ''){
            var parametre="ref="+ref;
            $.ajax({
                type: 'GET',
                data: parametre,
                dataType: 'json',
                url: './lib/php/ajax/ajaxRechercheProduit.php',
                success: function(data){
                    console.log(data);
                    $('#denomination').val(data[0].nom_produit);
                    if($('#denomination').val()!='') {
                        $('#inserer').hide();
                        $('#editer').show();
                    }else{
                        $('#editer').hide();
                        $('#inserer').show();
                    }
                    $('#description').val(data[0].description);
                    $('#prix').val(data[0].prix);
                    $('#stock').val(data[0].stock);
                    $('#id_produit').val(data[0].id_produit);
                }
            });
            $('#reference').click(function(){
                $('#reference').val('');
                $('#denomination').val('');
            });
        }
    });

    $('#recup').blur(function(){
        var recup = $(this).val(); //val = récupération des valeurs dans un formulaire
        alert(recup);
    });

    $('span[id]').click(function(){
        var valeur1 = $.trim($(this).text());
        //récupération des attributs name et id de la zone cliquée
        var ident = $(this).attr("id"); //valeur de l'id
        var name = $(this).attr("name"); //champ à modifier
        //alert("ident  = "+ident+" et name = "+name);
        $(this).blur(function(){
            var valeur2 = $.trim($(this).text());
            //alert("valeur 1 : "+valeur1+ " valeur2 : "+valeur2);
            if(valeur1 != valeur2){
                //écriture des paramètres de l'URL
                var parametre = 'champ='+name+'&id='+ident+'&nouveau='+valeur2;
                //alert(parametre);
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
});