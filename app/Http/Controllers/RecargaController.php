<?php

namespace App\Http\Controllers;

use App\Cartao;
use App\Recarga;
use Illuminate\Http\Request;

class RecargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $cards = Cartao::find($id);
    return view('card.recarga', compact('cards'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    // Create lancamento
    $lancamento = Recarga::create([
        'descrição' => $request['descricao'],
        'valor' => $request['valor'],
        'tipo' => $request['tipo'],
        'cartao_id' => $id,
    ]);
    $saldo = str_replace(',', '.', $request->saldo2);
    $valor = $request->valor;
    $result = ((float)$saldo + (float)$valor);
    $newsaldo = ($result);
    $card = Cartao::find($id);
    $card->fill(['saldo' => $newsaldo]);
    $card->save();
        return redirect(route('cards.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
