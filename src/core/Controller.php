<?php
namespace Devcon\Core;

use Devcon\Helpers\Url;

class Controller {
    /**
     * Instancia um novo Controller
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Carrega a model especificada para o controller
     *
     * @param string $model_name
     * @return void
     */
    public function loadModel($model_name = '')
    {
        $model_class_name = "Devcon\\Models\\".$model_name;
        $this->$model_name = new $model_class_name();
    }

    /**
     * Carrega uma view passando dados por parâmetro
     *
     * @param string $view_name
     * @param array $data
     * @return void
     */
    public function loadView($view_name = '',$data = array())
    {
        foreach ($data as $variable => $value) {
            $$variable = $value;
        }
        include(PATH_VIEW.$view_name.".php");
    }
}