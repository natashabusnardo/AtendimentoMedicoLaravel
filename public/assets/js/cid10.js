/* It's a jQuery function that is called when the cid_id input is changed. */
$("#cid_id").change(function() {
    let cid_id = $(this).val();
    let url = "http://localhost:8080/cidcode/" + cid_id;

    if (cid_id.length !== 4) {
        return;
    } else {
        $.get(url, function(data){
            $("#descricao").val(data.descricao);
        });
    }
});