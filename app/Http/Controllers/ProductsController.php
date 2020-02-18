<?php

namespace App\Http\Controllers;
use App\Product;
use App\Plataforma;
use App\Plataformaprod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
    return view('products.index', compact('products'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plataforma = Plataforma::all('name','id');
        return view('products.add', compact('plataforma'));
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
        'name' => 'bail|required|unique:produto|min:2',
        'url' => 'required|unique:produto',
    ]);
        $user_id = Auth::user()->id;
    if ( $product = Product::create([
        'user_id' => $user_id,
        'name' => $request['name'],
        'url' => $request['url'],
        'is_active' => $request['is_active'],
    ])){
       flash('Produto criado.');
        }
    else {
        flash()->error('Não foi possivel criar produto.');
    }

        foreach ($request->addmore as $value)
        {
             Plataformaprod::create([
            'product_key' => $value['product_key'],
            'basic_authentication' => $value['basic_authentication'],
            'codigo_produto' => $value['codigo_produto'],
            'plataforma_id' => $value['plataforma'],
            'product_id' => $product->id,
        ]);
        }
    return redirect()->route('produtos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
}
