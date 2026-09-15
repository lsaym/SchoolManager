<?php

namespace App\Http\Controllers;

use App\Models\EscolaModel;
use Illuminate\Http\Request;
use App\Services\GetDataService;

class managerController extends Controller
{
    public function __construct(
        private GetDataService $getDataService,
    ) {}
    public function painelAcademico()
    {
        $dadosAlunosEscola = $this->getDataService->getDataEscola();
        $alunos = $dadosAlunosEscola->get();
        $escolas = EscolaModel::all();
        return view('painelAcademico', compact('escolas', 'alunos'));
    }

    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
