    <div style="text-align: right"><button type="button" class="btn btn-success novo">Novo Usuário</button></div>
    <table id="usuários" class="table table-sm table-hover">
        <thead>
            <th>#</th> 
            <th>Nome</th> 
            <th>E-Mail</th> 
            <th>&nbsp;</th> 
        </thead>
        <tbody>
            <?php
            if (count($rows)) {
                foreach ($rows as $key => $row) {
            ?>
            <tr>
                <td><?php echo $row->id;?></td>
                <td><a href="#" class="link-detalhes" data-id="<?php echo $row->id;?>"><?php echo $row->nome;?></a></td>
                <td><?php echo $row->email;?></td>
                <td class='td_centered'>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Ações">
                        <button type="button" class="btn btn-secondary editar" data-id="<?php echo $row->id;?>">Editar</button>
                        <button type="button" class="btn btn-secondary btn-tabela-apagar" data-id="<?php echo $row->id;?>">Apagar</button>
                    </div>
                </td>
            </tr>
            <?php
                }
            } else {
            ?>
            <tr>
                <td colspan="5" class='td_centered'>Não existem usuários cadastrados</td>
            </tr>
            <?php    
            }
            ?>
        </tbody>
    </table>
    
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLongTitle">&nbsp;</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              &nbsp;
            </div>
        </div>
    </div>
</div>
