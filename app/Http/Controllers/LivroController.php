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
     * Display a listing of the resource.
     */
    public function index()
    {

        $this->repository->selectAtributosRegistrosRelacionados('autores');

        return $this->repository->listaModelos();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivroRequest $request)
    {
        return $this->repository->criarModelo($request);
    }

    /**
     * Display the specified resource.
     */
    public function show( int  $id)
    {
        return $this->repository->listarUmModelo($id);
    }


    public function update(UpdateLivroRequest $request, int $id)
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
