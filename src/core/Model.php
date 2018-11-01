<?php
namespace Devcon\Core;

use PDO;

class Model
{   
    protected $db;
	protected $table;
	protected $id;

    /**
     * Instancia uma nova Model
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = '';
        $this->id = 'id';
    }

    /**
     * Instancia uma conexão com o banco de dados e passa para a Model
     *
     * @return void
     */
    public function loadDatabase(){
        $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    }
	
	   /**
     * Busca todos os registros na tabela e retorna
     *
     * @return array
     */
    public function get($where=[], $orderby = '' ,$limit=false)
    {
        $sql = 'SELECT * FROM ' . $this->table . ((count($where)) ? ' WHERE ' : '');
        $prepare = [];
        $operators = ['>=', '>', '<=', '<'];
        foreach($where as $field => $value){
            $operator = ' = ';
            foreach($operators as $op){
                if (strpos($field, $op) !== false) {
                    $operator = $op;
                    $field = str_replace($op, '', $field);
                }
            }
            $sql .= $field . ' ' . $operator . ' :'.$field;
            $prepare[':'.$field] = $value;
        }
        
        $sql .= (strlen($orderby)) ? ' ORDER BY ' . $orderby : '';
        $sql .= ($limit !== false) ? ' LIMIT 0,' . $limit : '';
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($prepare);
        
        $rows = array();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    /**
     * Recebe um ID e retorna seus dados
     *
     * @param integer $id
     * @return array
     */
    public function getById($id)
    {
        $rs = $this->db->query("SELECT * FROM " . $this->table . " WHERE " . $this->id . " = ".$id);
        $rows = array();
        if ($rs->rowCount() > 0) {
            $row = $rs->fetch(PDO::FETCH_OBJ);
            return $row;
        } else {
            return false;
        }

    }

    /**
     * Insere um novo registro no banco de dados
     *
     * @param array $input_data
     * @return void
     */
    public function add($input_data)
    {
		if (array_key_exists($this->id, $input_data)) unset($input_data[$this->id]);
		$sql = 'INSERT INTO ' . $this->table . '(' . implode(',', array_keys($input_data)) . ') VALUES (:' . implode(', :', array_keys($input_data)) . ')';
        $stmt = $this->db->prepare($sql);
        $i = 1;
		$prepare = [];
        foreach($input_data as $field => $value){
            $prepare[':'.$field] = $value;
        }
        $stmt->execute($prepare);

        $lastInsertId = $this->db->lastInsertId();
        
        if ($lastInsertId > 0) {
            return $lastInsertId;
        } else {
            return false;
        }
    }

    /**
     * Recebe um ID e altera o registro
     *
     * @param integer $id
     * @param array $input_data
     * @return void
     */
    public function update($id, $input_data)
    {
        $prepare = [':id' => $id];
        $sql = 'UPDATE ' . $this->table . ' SET ';
        
        foreach($input_data as $field => $value){
            $sql .= $field . ' = :' . $field . ', ';
            $prepare[':'.$field] = $value;
        }
        
        $stmt = $this->db->prepare($sql . 'updated_at = NOW() WHERE ' . $this->id . ' = :id');
        $stmt->execute($prepare);

        $affected_rows = $stmt->rowCount();
        
        if ($affected_rows > 0) {
            return $affected_rows;
        } else {
            return false;
        }
    }

    /**
     * Recebe um ID e apaga o registro
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM " . $this->table . " WHERE " . $this->id . " = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $affected_rows = $stmt->rowCount();
        
        if ($affected_rows > 0) {
            return $affected_rows;
        } else {
            return false;
        }
    }
}