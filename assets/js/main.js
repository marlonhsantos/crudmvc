'use strict';

var Usuario = {};

Usuario.functions = {
    edit: (id,input_data) => {
        console.log("edit "+id);
        const url = './?action=update&id='+id;
        $.post(url, input_data, (data) => {
            if (data.err == undefined || data.err == false) {
                alert("Usuário atualizado com sucesso!");
            } else {
                alert('Erro ao tentar atualizar o usuário');
            }
        });
    },
    add: (input_data) => {
        console.log("add");
        const url = './?action=add';
        $.post(url, input_data, (data) => {
            if (data.id != undefined) {
                alert("Usuário cadastrado com sucesso!");
                location.href = './?action=get&id='+data.id;
            } else {
                alert('Erro ao tentar cadastrar o novo usuário');
            }
        });
    },
    delete: (id, btn) => {
        console.log("delete "+id);
        const url = './?action=delete&id='+id;
        $.post(url, (data) => {
            if (data.err == undefined || data.err == false) {
                //apagar linha da tabela
                if (btn.hasClass('btn-tabela-apagar')) {
                    btn.closest('tr').remove();
                } else {
                    location.reload();
                }
            } else {
                alert('Erro ao tentar apagar o usuário');
            }
        });
    }
};

$(document).ready(function(){
    $('.editar').on('click',function(){
        let id = $(this).data('id');
        location.href = './?action=get&id='+id;
    });
    
    $('.novo').on('click',function(){
        location.href = './?action=create';
    });
    
    $('.link-detalhes').on('click', function () {
        const id = $(this).data("id");
        const url = './?action=getJSON&id='+id;
        $.get(url, (data) => {
            $('#detailModalLongTitle').html('Detalhes do usuário');
            let modal_body = '<p><b>Nome:</b> ' + data.nome + '</p>';
            modal_body    += '<p><b>E-Mail:</b> ' + data.email + '</p>';
            modal_body    += '<p><b>Data de criação:</b> ' + data.created_at + '</p>';
            $('.modal-body').html(modal_body);
            $('#detailModal').modal();
        });
    });
  
    $('#form_usuario').on('submit',function(e){
        e.preventDefault();
        const input_data = $(this).serialize();
        if ($('#id').val() != undefined && $.isNumeric($('#id').val())) {
            let id = $('#id').val();
            Usuario.functions.edit(id,input_data);
        } else {
            Usuario.functions.add(input_data);
        }

    });

    $('.btn-tabela-apagar').on("click",function(){
        const id = $(this).data("id");
        const btn = $(this);
        if (confirm('Tem certeza que deseja apagar o registro?\nEssa operação não tem volta!')) {
            Usuario.functions.delete(id, btn);
        }
    });
});


