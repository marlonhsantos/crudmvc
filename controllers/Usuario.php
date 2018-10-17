<?php
class Usuario extends Controller 
{
    /**
     * Instancia um Controller para Usuario e carrega uma Model para conexão com banco
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('UsuarioModel');
    }

    /**
     * Carrega a view padrão com a listagem de usuários
     *
     * @return void
     */
    public function index()
    {
        $data["title"] = "Lista de usuários";
        $data["rows"] = $this->UsuarioModel->get([], 'nome, email');
        $this->loadView('inc/header',$data);
        $this->loadView('Usuario/index',$data);
        $this->loadView('inc/footer');
    }

    /**
     * Recebe um id de usuário e carrega os dados em formulário
     *
     * @return void
     */
    public function get()
    {
        if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
            $data["title"] = "Usuario não encontrado!";
            $this->loadView('inc/header',$data);
            $this->loadView('Usuario/nao_encontrado');
            $this->loadView('inc/footer');
        } else {
            $id = $_GET["id"];
            $data["title"] = "Editar usuário";
            $row = $this->UsuarioModel->getById($id);
            if (is_object($row)) {
                
                $data["id"] = $id;
                $data["nome"] = $row->nome;
                $data["email"] = $row->email;
                $data["senha"] = $row->senha;

                $this->loadView('inc/header',$data);
                $this->loadView('Usuario/form',$data);
                $this->loadView('inc/footer');
            } else {
                $data["title"] = "Usuario não nao_encontrado";
                $this->loadView('inc/header',$data);
                $this->loadView('Usuario/nao_encontrado');
                $this->loadView('inc/footer');
            }
        }
    }
    
    /**
     * Recebe um id de usuário e retorna os dados em JSON
     *
     * @return json
     */
    public function getJSON()
    {
        $output = [];
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];
            $row = $this->UsuarioModel->getById($id);
            if (is_object($row)) {
                $output["id"] = $id;
                $output["nome"] = $row->nome;
                $output["email"] = $row->email;
                $output["senha"] = $row->senha;
                $output["created_at"] = date("d/m/Y H:i:s", strtotime($row->created_at));
                $output["updated_at"] = date("d/m/Y H:i:s", strtotime($row->updated_at));
            }
        }
        $data["output"] = json_encode($output);
        $this->loadView('json_output',$data);
    }

    /**
     * Recebe dados do usuário e exibe um formulário para criação de novo Usuario
     *
     * @return void
     */
    public function create()
    {

        $data["title"] = "Novo usuário";
        $data["id"] = '';
        $data["nome"] = '';
        $data["email"] = '';
        $data["senha"] = '';
        $this->loadView('inc/header',$data);
        $this->loadView('Usuario/form',$data);
        $this->loadView('inc/footer');
    }

    /**
     * Recebe dados do usuário e adiciona um novo usuário exibindo o resultado em JSON
     *
     * @return void
     */
    public function add()
    {
        $output_data = [];
        if (isset($_POST) && count($_POST) > 0) {
            $input_data = $_POST;
			$input_data["senha"] = password_hash($input_data["senha"], PASSWORD_BCRYPT);
            $id = $this->UsuarioModel->add($input_data);
            if (is_numeric($id)) {
                $output_data["id"] = $id;
            } else {
                $output_data["err"] = true;
            }
        }
        $data["output"] = json_encode($output_data);
        
        $this->loadView('json_output',$data);
    }

    /**
     * Recebe dados do usuário e um ID de Usuario para alterar os dados e exibindo o resultado em JSON
     *
     * @return void
     */
    public function update()
    {
        if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
            $output_data["err"] = true;
        } else {
            $id = $_GET["id"];
            $output_data = [];

            if (isset($_POST) && count($_POST) > 0) {
                $input_data = $_POST;
				if (strlen(trim($input_data["senha"]))==0) {
					unset($input_data["senha"]); // A senha só é alterada se for preenchida no form de update
				} else {
					$input_data["senha"] = password_hash($input_data["senha"], PASSWORD_BCRYPT);
				}
                $affected_rows = $this->UsuarioModel->update($id, $input_data);
                if (is_numeric($affected_rows)) {
                    $output_data["affected_rows"] = $affected_rows;
                } else {
                    $output_data["err"] = true;
                }

            }
        }

        $data["output"] = json_encode($output_data);
        
        $this->loadView('json_output',$data);
    }

    /**
     * Recebe um ID de Usuario e o apaga exibindo o resultado em JSON
     *
     * @return void
     */
    public function delete()
    {
        if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
            $output_data["err"] = true;
        } else {
            $id = $_GET["id"];
            $output_data = [];

            $affected_rows = $this->UsuarioModel->delete($id);
            if (is_numeric($affected_rows)) {
                $output_data["affected_rows"] = $affected_rows;
            } else {
                $output_data["err"] = true;
            }
        }

        $data["output"] = json_encode($output_data);
        
        $this->loadView('json_output',$data);
    }
}