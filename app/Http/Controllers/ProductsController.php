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
use Illuminate\Database\QueryException;


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

    catch (QueryException $e)
    {
        if($e->getCode() === '23000')
        {
            return redirect()->route('products.create')->withErrors(['Plataforma com duplica!', 'Produto criado com apenas uma plataforma!', 'Para alterar as plataformas vá para: Produtos->Todos os Produtos->Editar\Adicionar Plataforma!',' Caso o erro persista contate dev@kings7.com.br']);
        }
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
            foreach ($request->addmore as $value)
            {
               Plataformaprod::where('product_id', $id)
               ->where('plataforma_id', $value['plataforma_id'])
               ->update(
                [
                'product_key' => $value['product_key'],
                'basic_authentication' => $value['basic_authentication'],
                'codigo_produto' => $value['codigo_produto'],
                'plataforma_id' => $value['plataforma_id'],
                ]
                );
            }
            return redirect(route('products.index'));
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

    public function updateStatus(Request $request)
{
    $products = Product::findOrFail($request->produto_id);
    $products->is_active = $request->is_active;
    $products->save();

    return response()->json(['message' => 'Product status updated successfully.']);
}
}
