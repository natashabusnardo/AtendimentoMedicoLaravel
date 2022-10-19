$("#estado").on("change", function() {
    var estado = $(this).val();
    var url = "/cidade/" + estado + "/estado";
    $.get(url, function(data){
        $("#cidade_id").empty();
        $.each(data, function(i, cidade){
            $("#cidade_id").append("<option value='"+cidade.id+"'>"+cidade.nome+"</option>");
        });
    });
});