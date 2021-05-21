$(document).ready(function () {

    $('span[id]').click(function(){
        var valeur1 = $.trim($(this).text());
        var ident = $(this).attr("id");
        var name = $(this).attr("name");
        $(this).blur(function(){
            var valeur2 = $.trim($(this).text());
            if(valeur1 != valeur2){
                var parametre = 'champ='+name+'&id='+ident+'&nouveau='+valeur2;
                $.ajax({
                    type: 'GET',
                    data: parametre,
                    dataType: 'text',
                    url: './lib/php/ajax/ajaxRechercheProduit.php',
                    success: function(data){
                        console.log(data);
                    }
                });
            }
        });
    });

    $('span[id]').click(function(){
        var valeur1 = $.trim($(this).text());
        var ident = $(this).attr("id");
        var name = $(this).attr("name");
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