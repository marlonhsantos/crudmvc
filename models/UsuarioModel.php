<?php
class UsuarioModel extends Model
{
    /**
     * Instancia um novo Modelo para Usuario e carrega conexão com o banco de dados
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadDatabase();
		$this->table = 'usuarios';
		$this->id = 'id';
    }
}