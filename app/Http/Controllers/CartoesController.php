<?php

namespace App\Http\Controllers;

use App\Lancamento;
use App\Cartao;
use App\CartaoBanco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $cards = Cartao::all();
    $bancos = CartaoBanco::all();
    return view('card.index', compact('cards', 'bancos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bancos = CartaoBanco::all();
    return view('card.add', compact('bancos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'cartao_banco_id' => 'required',
        'digitos' => 'required|min:6|max:7',
        'saldo' => 'required',
    ]);
        $saldo = floatval(str_replace(',', '.', $request->saldo));
    if ( $card = Cartao::create([
        'digitos' => $request['digitos'],
        'tipo' => $request['tipo'],
        'saldo' => $saldo,
        'cartao_banco_id' => $request['cartao_banco_id']
    ])) {
        Lancamento::create([
            'descrição' => 'Saldo Inicial' . ' - ' . $request['digitos'],
            'valor' => $request['saldo'],
            'tipo' => 'C',
            'cartao_id' => $card->id,
            'cartao_digitos' => $request['digitos'],
        ]);

        flash('Cartão adicionado.');
    } else {
        flash()->error('Não foi possível criar o cartão, verifique as informações.');
    }

    return redirect()->route('cards.index');
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
    $bancos = CartaoBanco::all();
    return view('card.edit', compact('cards','bancos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $this->validate($request, [
        'digitos' => 'bail|required|min:6|max:6',
        'cartao_banco_id' => 'required',
        'tipo' => 'required',
    ]);

    // Get the user
    $card = Cartao::findOrFail($id);

    // Update user
    $card->fill($request->all());

    $card->save();
    flash()->success('User has been updated.');
    return redirect()->route('cards.index');
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

    public function resgate($id)
    {
    $cards = Cartao::find($id);
    return view('card.resgate', compact('cards'));
    }
}
