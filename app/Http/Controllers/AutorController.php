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
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('atributos_livro')) {
            $atributos_livro = 'livros:autor_id,'.$request->atributos_livro;
            $this->repository->selectAtributosRegistrosRelacionados($atributos_livro);
        }
        else{
            $this->repository->selectAtributosRegistrosRelacionados('livros');
        }
        return $this->repository->listaModelos();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAutorRequest $request)
    {
       return $this->repository->criarModelo($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return $this->repository->listarUmModelo($id);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAutorRequest $request, int $id)
    {
        return $this->repository->atualizarModelo($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        return $this->repository->deletarModelo($id);
    }
}
