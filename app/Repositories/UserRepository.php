<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository{


    public function __construct(User $model) {
        $this->model = $model;
    }

    public function criarModelo(Request $request){

        $model = $this->model->create(
            [
                'name' => $request-> name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'administrador' => $request-> administrador
            ]
        );

        return response()->json($model, 201);
    }

    public function atualizarModelo(Request $request, int $id){
        $modelo = $this->model->find($id);
        if($modelo){
            $modelo->fill($request->all());
            if($request-> password){

                $modelo->password = bcrypt($request->password);
            }

            $modelo->save();

            return response()->json($modelo, 200);
        }
        return response()->json(['erro' => 'Impossivel atualizar,Recurso pesquisado não existe'],404);

    }

}

?>


