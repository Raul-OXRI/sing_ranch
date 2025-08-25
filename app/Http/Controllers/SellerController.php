<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\cow;
use App\Models\User;
use App\http\Middleware\InvalidateMiddleware;
use Illuminate\Support\Carbon;

class SellerController extends Controller
{
    //
    public function show()
    {
        Seller::whereNotNull('token_expire')
            ->where('token_expire', '<', now())
            ->update(['token_expire' => null]);

        $cows = cow::where('status', 1)->get();
        $users = User::where('rol', 'comprador')->get();

        $seller = Seller::whereNotNull('token_expire')
            ->where('token_expire', '>=', now())
            ->get();

        return view('Seller.all-seller', compact('cows', 'seller', 'users'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'unit_price' => 'nullable|numeric',
            'final_weight' => 'nullable|numeric',
            'by_sight' => 'nullable|numeric',
            'cow_id' => 'required|exists:cows,id',
            'cod_user' => 'required|exists:users,id'
        ]);

        $seller = Seller::create($data);

        $token = $seller->generateToken(3);

        cow::where('id', $data['cow_id'])->update(['status' => 3, 'sold_date' => Carbon::today()->toDateString()]);

        return redirect(route('Seller.show'))->with('success', 'Información del vendedor almacenada con éxito')->with('token', $token);
    }

    public function unitPrice(Request $request, $id)
    {
        $validate = $request->validate([
            'unit_price' => 'nullable|numeric',
            'final_weight' => 'nullable|numeric',
        ]);

        $seller = Seller::findOrFail($id);
        $seller->update($validate);

        return redirect(route('Seller.show'))->with('success', 'Información del vendedor actualizada con éxito');
    }

    public function bySight(Request $request, $id)
    {
        $validate = $request->validate([
            'by_sight' => 'nullable|numeric',
        ]);

        $seller = Seller::findOrFail($id);
        $seller->update($validate);

        return redirect(route('Seller.show'))->with('success', 'Información del vendedor actualizada con éxito');
    }
}
