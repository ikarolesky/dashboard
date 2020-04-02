<?php

namespace App\Http\Controllers;

use App\Product;
use App\Form;
use App\FormSub;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::all();
        return view('form.index' , compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('form.create' , compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = Form::create([
            'nome_form' => $request['nome_form'],
            'conteudo1' => $request['conteudo1'],
            'conteudo2' => $request['conteudo2'],
            'conteudo3' => $request['conteudo3'],
            'conteudo4' => $request['conteudo4'],
            'url' => $request['url'],
            'produto' => $request['produto'],
        ]);
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
        //
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
        //
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

    public function sub(Request $request)
    {
            $url = $request->url;
            FormSub::create([
                'forms_id' => $request['form_id'],
                'nome' => $request['nome'],
                'email' => $request['email'],
                'telefone' => $request['telefone'],
                'selecione' => $request['selecione'],
                'user_id' => $request['user_id'],
            ]);

                return redirect()->away($url);
    }
}
