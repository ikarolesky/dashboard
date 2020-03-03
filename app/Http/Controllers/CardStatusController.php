<?php

namespace App\Http\Controllers;
use App\Cartao;
use Illuminate\Http\Request;

class CardStatusController extends Controller
{

public function updateStatus(Request $request)
{
    $card = Cartao::findOrFail($request->cartao_id);
    $card->status = $request->status;
    $card->save();

    return response()->json(['message' => 'Card status updated successfully.']);
}
}