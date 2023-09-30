<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function __construct( UserRepository $repository) {
        $this->repository = $repository;
    }


     /**
     *  * @OA\Post(
    *     path="/User",
    *     tags={"User"},
    *  security={{ "apiAuth": {} }},
    *     summary="Criar um usuario",
    *     description="Cria um usuario",
    *     @OA\RequestBody(
    *       required = true,
    *      @OA\JsonContent(
    *           type="object",
    *            @OA\Property(property="name",type="string"),
    *            @OA\Property(property="email",type="string"),
    *           @OA\Property(property="password",type="string"),
    *           @OA\Property(property="administrador",type="boolean"),
    *       )
    *    ),
    *     @OA\Response(
    *         response=201,
    *           description="Criado",
    *           @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="daniinho",
     *                  description="nome do usuario",
     *                  property="name"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="deyllonp986@gmail.com",
     *                  description="email do usuario",
     *                  property="email"
     *              ),
     *              @OA\Property(
     *                  format="string",
     *                  default="amanha27",
     *                  description="senha do usuario",
     *                  property="password"
     *              ),
     *               @OA\Property(
     *                  format="boolean",
     *                  default="S",
     *                  description="se um usuario é administrador ou não",
     *                  property="administrador"
     *              ),
     *          )
    *     )
    *)
     */

    public function store(StoreUserRequest $request)
    {
       return $this->repository->criarModelo($request);
    }

     /**
     * @OA\Put(
     *  tags={"User"},
     *  path="/User/{User}",
     *  security={{ "apiAuth": {} }},
     *  @OA\Parameter(
     *      description="Id do usuario",
     *      in="path",
     *      name="User",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     * summary="Atualizar um Usuario",
    *    description="Atualizar um Usuario",
    *    @OA\RequestBody(
    *      required = true,
    *      @OA\JsonContent(
    *          type="object",
    *          @OA\Property(property="name",type="string"),
    *          @OA\Property(property="email",type="string"),
    *          @OA\Property(property="password",type="string"),
    *          @OA\Property(property="administrador",type="boolean"),
    *      )
    *    ),
     *   @OA\Response(
    *         response=200,
    *           description="Atualizado",
    *           @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="danilp864@gmail.com",
     *                  description="email do usuario",
     *                  property="email"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="dabip",
     *                  description="nome do usuario",
     *                  property="name"
     *              ),
     *              @OA\Property(
     *                  format="boolean",
     *                  default="N",
     *                  description="se o usuario é administrador ou não",
     *                  property="administrador"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="amazingk",
     *                  description="senha do usuario",
     *                  property="password"
     *              ),
     *          )
    *     )
     * )
     */


    public function update(UpdateUserRequest $request, int $id)
    {
        return $this->repository->atualizarModelo($request, $id);
    }
}
