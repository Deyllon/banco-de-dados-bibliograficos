<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAuthRequest;
use App\Http\Requests\UpdateAuthRequest;
use App\Repositories\AuthRepository;




class AuthController extends Controller
{

    public function __construct( AuthRepository $repository) {
        $this->repository = $repository;
    }

    /**
     *  * @OA\Post(
    *     path="/Login",
    *     tags={"Auth"},
    *     summary="Login do usuario",
    *     description="Retorna o token jwt para o login do usuario",
    *     @OA\RequestBody(
    *       required = true,
    *      @OA\JsonContent(
    *           type="object",
    *            @OA\Property(property="email",type="string"),
    *            @OA\Property(property="password",type="string")
    *       )
    *    ),
    *     @OA\Response(
    *         response=200,
    *         description="Resposta de sucesso: ok",
    *           @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="token de acesso : ",
     *                  description=" string indicando o token",
     *                  property="string"
     *              ),
     *              @OA\Property(
     *                  format="string",
     *                  default="20d338931e8d6bd9466edeba78ea7dce7c7bc01aa5cc5b4735691c50a2fe3228",
     *                  description="token",
     *                  property="token"
     *              ),
     *              @OA\Property(
     *                  format="integer",
     *                  default="200",
     *                  description="status da resposta",
     *                  property="integer"
     *              )
     *          )
    *     )
    *)
     */
    public function login(StoreAuthRequest $request){
        return $this->repository->login($request);
    }

    /**
     * @OA\Post(
     *  path="/logout",
     *  tags={"Auth"},
     *  summary="Logout do usuario",
     *  description="Faz o logout do usuario",
    *  security={{ "apiAuth": {} }}
     *     ,
     *  @OA\Response(
    *         response=200,
    *         description="Resposta de sucesso: ok",
    *           @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default=" msg",
     *                  description=" string indicando a mensagem",
     *                  property="string"
     *              ),
     *              @OA\Property(
     *                  format="string",
     *                  default="logout realizado",
     *                  description="mensagem falando que o usuario foi deslogado",
     *
     *              ),
     *
     *          )
    *     )
     * )
     */
    public function logout() {

        return $this->repository->logout();
    }

    /**
     * @OA\Post(
     *  path="/refresh",
     *  tags={"Auth"},
     *  summary="Refresh do token",
     *  description="Faz o refresh do token",
     * security={{ "apiAuth": {} }},
     *  @OA\Response(
    *         response=200,
    *         description="Resposta de sucesso: ok",
    *           @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default=" token",
     *                  description=" mensagem indicando o token",
     *                  property="string"
     *              ),
     *             @OA\Property(
     *                  format="string",
     *                  default="20d338931e8d6bd9466edeba78ea7dce7c7bc01aa5cc5b4735691c50a2fe3228",
     *                  description="token",
     *                  property="token"
     *              ),
     *
     *          )
    *     )
     * )
     */
    public function refresh() {
        return $this->repository->refresh();
    }


}
