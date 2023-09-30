<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Repositories\AutorRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAutorRequest;
use App\Http\Requests\UpdateAutorRequest;
use Illuminate\Http\Request;

class AutorController extends Controller
{

    public function __construct(Autor $autor, AutorRepository $repository) {
        $this->autor = $autor;
        $this->repository = $repository;
    }

    /**
     * @OA\GET(
     *  tags={"Autor"},
     *  path="/Autor",
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
     *                  default="tolkien",
     *                  description="nome do Autor",
     *                  property="Autor"
     *              ),
     *
     *          )
     *      )
     *  )
     * )
     */
    public function index(Request $request)
    {
        if($request->has('atributos_livro')) {
            $atributos_livro = 'livros:autor_id,'.$request->atributos_livro;
            $this->repository->selectAtributosRegistrosRelacionados($atributos_livro);
        }

        return $this->repository->listaModelos();
    }


    /**
     *  * @OA\Post(
    *     path="/Autor",
    *     tags={"Autor"},
    *  security={{ "apiAuth": {} }},
    *     summary="Criar um autor",
    *     description="Cria um autor",
    *     @OA\RequestBody(
    *       required = true,
    *      @OA\JsonContent(
    *           type="object",
    *            @OA\Property(property="nome",type="string")
    *       )
    *    ),
    *     @OA\Response(
    *         response=201,
    *           description="Criado",
    *           @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="tokien",
     *                  description="nome do autor",
     *                  property="nome"
     *              ),
     *
     *          )
    *     )
    *)
     */
    public function store(StoreAutorRequest $request)
    {
       return $this->repository->criarModelo($request);
    }

     /**
     *@OA\GET(
     *  tags={"Autor"},
     *  path="/Autor/{Autor}",
     *  security={{ "apiAuth": {} }},
     *  @OA\Parameter(
     *      description="Id do Autor",
     *      in="path",
     *      name="Autor",
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
     *                  default="tolkien",
     *                  description="tolkien",
     *                  property="nome"
     *              ),
     *
     *          )
     *  )
     * )
     */
    public function show(int $id)
    {
        return $this->repository->listarUmModelo($id);
    }



    /**
     * @OA\Put(
     *  tags={"Autor"},
     *  path="/Autor/{Autor}",
     *  security={{ "apiAuth": {} }},
     *  @OA\Parameter(
     *      description="Id do livro",
     *      in="path",
     *      name="Autor",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      ),
     *  ),
     * summary="Atualizar um Autor",
    *    description="Atualizar um Autor",
    *    @OA\RequestBody(
    *      required = true,
    *      @OA\JsonContent(
    *          type="object",
    *          @OA\Property(property="nome",type="string"),
    *      )
    *    ),
     *   @OA\Response(
    *         response=200,
    *           description="Atualizado",
    *           @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="string",
     *                  default="tolkien",
     *                  description="nome do autor",
     *                  property="nome"
     *              ),
     *
     *          )
    *     )
     * )
     */
    public function update(UpdateAutorRequest $request, int $id)
    {
        return $this->repository->atualizarModelo($request, $id);
    }

     /**
     * @OA\Delete(
     *  tags={"Autor"},
     *  summary="Remove o Autor especifico",
     *  description="Remove o livro",
     *  path="/Autor/{Autor}",
     *  security={{ "apiAuth": {} }},
     *  @OA\Parameter(
     *      description="Id do livro",
     *      in="path",
     *      name="Autor",
     *      required=true,
     *      @OA\Schema(
     *          type="integer",
     *          format="int64"
     *      )
     *  ),
     *  @OA\Response(
     *       response=200,
    *         description="Autor deletado com sucesso",
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
     *                  default="Autor deletado",
     *                  description="mensagem falando que o Autor foi deletado",
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
