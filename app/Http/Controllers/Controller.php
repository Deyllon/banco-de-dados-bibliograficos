<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

 /**
    * @OA\Server(url="http://127.0.0.1:8000/api/v1/"),
    * @OA\Info(
    *     title="Um repositorio de autores e suas obras",
    *     version="1.0",
    *     description="Um repositorio para agrupar todos os autores e suas obras conhecidas da humanidade",
    *     termsOfService="https://minhaapi.com/terms"
    *     )
    *
    *  @OA\SecurityScheme(
    *  type="http",
 *     description="Pegue o token indo na operação login e passando o email e senha",
 *     name="Token JWT",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="apiAuth",
    *    )
    *
    *
    *
    */
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
