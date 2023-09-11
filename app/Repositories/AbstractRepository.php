<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class AbstractRepository {

    public function __construct(Model $model) {
        $this->model = $model;
    }
    public function listaModelos(){
        return response()->json($this->model->get(), 200);
    }




    public function criarModelo(Request $request){

        $model = $this->model->create(
            $request->all()
        );

        return response()->json($model, 201);
    }

    public function listarUmModelo(int $id){
        $modelo = $this->model->find($id);
        if($modelo){
            return response()->json($modelo,200);
        }
        return response()->json(['erro' => 'Recurso pesquisado não existe'],404);
    }

    public function atualizarModelo(Request $request, int $id){
        $modelo = $this->model->find($id);
        if($modelo){
            $modelo->fill($request->all());

            $modelo->save();

            return response()->json($modelo, 200);
        }
        return response()->json(['erro' => 'Impossivel atualizar,Recurso pesquisado não existe'],404);

    }

    public function deletarModelo(int $id){
        $modelo = $this->model->find($id);
        if($modelo){
            $modelo->delete();

            return response()->json(['msg' => 'Deletado'], 200);

        }

        return response()->json(['erro' => 'Impossivel atualizar,Recurso pesquisado não existe'],404);
    }

}

?>


