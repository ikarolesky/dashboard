<?php

namespace App\Http\Controllers;
use App\Product;
use App\Plataforma;
use App\Plataformaprod;
use Illuminate\Http\Request;
use App\Http\Requests\PlataformaRequest;
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
        $products = Product::latest()->paginate();
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
    try
    {

            // Validate Request for name and url
            $this->validate($request,
                [
                'nome' => 'bail|required|min:2|unique:produto,name',
                'url' => 'required|unique:produto',
                ]
            );
            // Grab the user->id
            $user_id = Auth::user()->id;
            // Create a new product
            if($product = Product::create(
                [
                'user_id' => $user_id,
                'name' => $request['nome'],
                'url' => $request['url'],
                'is_active' => $request['is_active'],
                ]
            ))
            {
               flash()->success('Produto criado.');
            }
            else
            {
                flash()->error('Não foi possivel criar produto.');
            }
            // For each of the addmore.*. fields create an entry on DB
            foreach ($request->addmore as $value)
            {
                 Plataformaprod::create(
                [
                'product_key' => $value['product_key'],
                'basic_authentication' => $value['basic_authentication'],
                'codigo_produto' => $value['codigo_produto'],
                'plataforma_id' => $value['plataforma'],
                'product_id' => $product->id,
                ]
                );
            }
            return redirect()->route('products.index');
    }

    catch (Exception $ex)
    {
            //Something went wrong
            abort(500, 'Você inseriu uma plataforma duplicada!! Produto criado com apenas a primeira entrada.');
    }

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
    $product = Product::find($id);
    $plataform = Plataforma::all()->pluck('name', 'id');
    $plataformprod = Plataformaprod::find($id);

    return view('products.edit', compact('product', 'plataform', 'plataformprod'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $plataform = implode('',$request->plataform);
    // Get the Product Plataform
    $product = Plataformaprod::where('plataforma_id', $request->plataform)->first();

    // Product  Plataform
    if(is_null($product))
    {
        $product = new Plataformaprod();
        $product->fill
    ([
        'product_key' => $request['product_key'],
        'basic_authentication' => $request['basic_authentication'],
        'product_id' => $id,
        'plataforma_id' => $plataform,
        'codigo_produto' => $request['codigo_produto'],
    ]);
    $product->save();
    }
    else
    {
    $product->fill
    ([
        'product_key' => $request['product_key'],
        'basic_authentication' => $request['basic_authentication'],
        'product_id' => $id,
        'plataforma_id' => $plataform,
        'codigo_produto' => $request['codigo_produto'],
    ]);
    $product->save();
    }

    flash()->success('Produto Atualizado com sucesso.');
    return redirect()->route('products.index');
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
