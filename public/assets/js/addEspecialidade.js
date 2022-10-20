/* Adding a new row to the table. */
$('#addEspecialidade').click(function(){
    var medico_id = $('#id').val();
    var especialidade_id = $('#especialidade_id').val();
    var especialidade_nome = $('#especialidade_id option:selected').text();
    var table = $('#especialidades');

    if (table.find('td:contains('+especialidade_nome+')').length != 0) {
        alert('Usuario já adicionado');
    } else if (medico_id == 0) {
        alert('Antes de adicionar uma especialidade, cadastre o médico');
    } else { 
        var tr = $('<tr class=align-middle></tr>');
        tr.append('<td id="especialidade_id" value="'+especialidade_id+'">'+especialidade_id+'</td>');''
        tr.append('<td>'+especialidade_nome+'</td>');
        tr.append('<td class="text-center"><a class="btn btn-outline-danger border rounded-circle" id="removeBtn" role="button" style="border-radius: 30px;border-width: 1px;"><i class="far fa-trash-alt"></i></a></td>')

        table.append(tr);
        
        $.ajax({
            url: '/medico/especialidade',
            type: 'POST',
            data: {
                medico_id: medico_id,
                especialidade_id: especialidade_id
            },
            success: function(data) {
                alert('Usuario adicionado com sucesso');
            }
        });
    }
});

/* A jQuery function that is used to bind an event handler to the "click" JavaScript event, or trigger
that event on an element. */
$(document).on('click', '#removeBtn', function(){
    $(this).closest('tr').remove();
    var medico_id = $('#id').val();
    var especialidade_id = $(this).closest('tr').find('td:eq(0)').text();
    $.ajax({
        url: '/medico/especialidade/'+medico_id+'/'+especialidade_id,
        type: 'DELETE',
        success: function(data) {
            alert('Especialidade removido com sucesso');
        }
    });
});

