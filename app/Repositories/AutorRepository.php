<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AutorRepository extends AbstractRepository {
    public function selectAtributosRegistrosRelacionados($atributos) {
        $this->model = $this->model->with($atributos);
        //a query está sendo montada
    }
}

?>


