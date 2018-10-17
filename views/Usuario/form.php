<form id="form_usuario" method="POST">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome do usuário" value="<?=$nome;?>" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Digite o e-mail do usuário" value="<?=$email;?>">
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite uma senha para o usuário" value="">
    </div>
    <input type="hidden" name="id" id="id" value="<?=$id?>">
  <button type="submit" class="btn btn-primary">Salvar</button>
</form>