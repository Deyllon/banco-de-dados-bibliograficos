<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Repositories\LivroRepository;
use Illuminate\Http\Request;


class LivroController extends Controller
{

    public function __construct(Livro $livro, LivroRepository $repository) {
        $this->livro = $livro;
        $this->repository = $repository;
    }
    /**
     * @OA\GET(
     *  tags={"Livro"},
     *  path="/Livro",
     *  security={{ "apiAuth": {} }},
     *  @OA\Response(
     *      response=200,
     *      description="ok",
     *      @OA\JsonContent(
     *          type="array",
     *          @OA\Items(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="senhor dos aneis",
     *                  description="nome do livro",
     *                  property="titulo"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="fantasia",
     *                  description="genero do livro",
     *                  property="genero"
     *              ),
     *              @OA\Property(
     *                  format="integer",
     *                  default="1",
     *                  description="id do autor do livro",
     *                  property="autor_id"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="2000",
     *                  description="numero de paginas do livro",
     *                  property="numeroPaginas"
     *              ),
     *          )
     *      )
     *  )
     * )
     */
    public function index()
    {



        return $this->repository->listaModelos();
    }


    /**
     *  * @OA\Post(
    *     path="/Livro",
    *     tags={"Livro"},
    *  security={{ "apiAuth": {} }},
    *     summary="Criar um Livro",
    *     description="Cria um Livro",
    *     @OA\RequestBody(
    *       required = true,
    *      @OA\JsonContent(
    *           type="object",
    *            @OA\Property(property="genero",type="string"),
    *            @OA\Property(property="titulo",type="string"),
    *           @OA\Property(property="numeroPaginas",type="integer"),
    *           @OA\Property(property="autor_id",type="integer"),
    *       )
    *    ),
    *     @OA\Response(
    *         response=201,
    *           description="Criado",
    *           @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="senhor dos aneis",
     *                  description="nome do livro",
     *                  property="titulo"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="fantasia",
     *                  description="genero do livro",
     *                  property="genero"
     *              ),
     *              @OA\Property(
     *                  format="integer",
     *                  default="1",
     *                  description="id do autor do livro",
     *                  property="autor_id"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="2000",
     *                  description="numero de paginas do livro",
     *                  property="numeroPaginas"
     *              ),
     *          )
    *     )
    *)
     */

    public function store(StoreLivroRequest $request)
    {
        return $this->repository->criarModelo($request);
    }

    /**
     *@OA\GET(
     *  tags={"Livro"},
     *  path="/Livro/{Livro}",
     *  security={{ "apiAuth": {} }},
     *  @OA\Parameter(
     *      description="Id do livro",
     *      in="path",
     *      name="Livro",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     *
     *  @OA\Response(
     *      response=200,
     *      description="ok",
     *      @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="senhor dos aneis",
     *                  description="nome do livro",
     *                  property="titulo"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="fantasia",
     *                  description="genero do livro",
     *                  property="genero"
     *              ),
     *              @OA\Property(
     *                  format="integer",
     *                  default="1",
     *                  description="id do autor do livro",
     *                  property="autor_id"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="2000",
     *                  description="numero de paginas do livro",
     *                  property="numeroPaginas"
     *              ),
     *          )
     *  )
     * )
     */
    public function show( int  $id)
    {
        return $this->repository->listarUmModelo($id);
    }

    /**
     * @OA\Put(
     *  tags={"Livro"},
     *  path="/Livro/{Livro}",
     *  security={{ "apiAuth": {} }},
     *  @OA\Parameter(
     *      description="Id do livro",
     *      in="path",
     *      name="Livro",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     * summary="Atualizar um Livro",
    *    description="Atualizar um Livro",
    *    @OA\RequestBody(
    *      required = true,
    *      @OA\JsonContent(
    *          type="object",
    *          @OA\Property(property="genero",type="string"),
    *          @OA\Property(property="titulo",type="string"),
    *          @OA\Property(property="numeroPaginas",type="integer"),
    *          @OA\Property(property="autor_id",type="integer"),
    *      )
    *    ),
     *   @OA\Response(
    *         response=200,
    *           description="Atualizado",
    *           @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="senhor dos aneis",
     *                  description="nome do livro",
     *                  property="titulo"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="fantasia",
     *                  description="genero do livro",
     *                  property="genero"
     *              ),
     *              @OA\Property(
     *                  format="integer",
     *                  default="1",
     *                  description="id do autor do livro",
     *                  property="autor_id"
     *              ),
     *               @OA\Property(
     *                  format="string",
     *                  default="2000",
     *                  description="numero de paginas do livro",
     *                  property="numeroPaginas"
     *              ),
     *          )
    *     )
     * )
     */
    public function update(UpdateLivroRequest $request, int $id)
    {
        return $this->repository->atualizarModelo($request, $id);
    }

    /**
     * @OA\Delete(
     *  tags={"Livro"},
     *  summary="Remove o Livro especifico",
     *  description="Remove o livro",
     *  path="/Livro/{Livro}",
     *  security={{ "apiAuth": {} }},
     *  @OA\Parameter(
     *      description="Id do livro",
     *      in="path",
     *      name="Livro",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      )
     *  ),
     *  @OA\Response(
     *       response=200,
    *         description="Livro deletado com sucesso",
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
     *                  default="Livro deletado",
     *                  description="mensagem falando que o Livro foi deletado",
     *
     *              ),
     *
     *          )
     *  )
     * )
     */
    public function destroy(int $id)
    {
        return $this->repository->deletarModelo($id);
    }
}
