<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AuthRepository {


    public function login(Request $request){
        $credencias = $request->all(['email','password']);

        $token = auth('api')->attempt($credencias);

        if($token){
            return response()->json(['token de acesso: ', $token, 200]);
        }
        return response()->json(['erro' => 'Usuario ou senha invalidos', 403]);
    }

    public function logout() {
        auth('api')->logout();
        return response()->json(['msg' => 'Logout foi realizado com sucesso!']);
    }

    public function refresh() {
        $token = auth('api')->refresh();
        return response()->json(['token' => $token]);
    }


}

?>


