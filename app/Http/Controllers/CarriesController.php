<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carries;
use GuzzleHttp\Client;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;

class CarriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carries = Carries::all();
        return response()->json($carries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Carries/Create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

        $transportadora = new Carries();
        $transportadora->id = Str::uuid();
        $transportadora->fill($request->all());
        // dd($transportadora);
        $transportadora->save();

            
            return response()->json(['Sucess' => 'Carrie created successfully'], 201);
        } catch (Throwable $th) {
            return response()->json(['Error' => 'Error creating carrie'], 400);
        }
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
        $transportadora = Carries::findOrFail($id);

        return Inertia::render('Carries/Edit', [
            'transportadora' => $transportadora,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $transportadora = Carries::findOrFail($request->id);
        $transportadora->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transportadora = Carries::findOrFail($id);
    
        $transportadora->delete();
    }

    public function getEnderecoFromViaCEP(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', "https://viacep.com.br/ws/{$request->cep}/json/");
        $endereco = json_decode($response->getBody(), true);
        return $endereco;
    }
}
