<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Stock;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $dataUser = Users::all();
        $dataItem = Items::where('item_category', 'Consumable')->get();

        if ($request->has('search')) {
            // $stock = Stock::where('username', 'LIKE', '%' . $request->search . '%')->get();
            $stock = Stock::join('users', 't_stock.user_id', 'users.id')
                ->join('t_item', 'item_id', 't_item.id')
                ->where('t_item.item_name', 'like', "%{$request->search}%")
                ->get(['t_stock.*', 'users.username', 't_item.item_name']);
        } else {
            // $stock = Stock::all();
            $stock = Stock::join('users', 't_stock.user_id', 'users.id')->join('t_item', 'item_id', 't_item.id')->get([
                't_stock.*', 'users.username', 't_item.item_name', 't_item.item_quantity'
            ]);
        }

        return view('inventory', compact('stock', 'dataUser', 'dataItem'));
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
    public function store(Request $request, Stock $stock, Items $items)
    {
        //
        if ($request->input('mode') == 'In') {
            Validator::make($request->all(), [
                'item' => 'required',
                'user' => 'required',
                'stock' => 'required',
                'status' => 'required',
                'description' => 'required'
            ])->validateWithBag('StockIn');
        } else {
            Validator::make($request->all(), [
                'item' => 'required',
                'user' => 'required',
                'stock' => 'required',
                'status' => 'required',
                'description' => 'required'
            ])->validateWithBag('StockOut');
        }

        $item_find = $items->where('id', $request->input('item'));
        $item_qty = $item_find->first()->item_quantity;


        $stock->user_id = $request->input('user');
        $stock->item_id = $request->input('item');
        $stock->status = $request->input('status');
        $stock->stock_date = now();
        $stock->updated_by = auth()->user()->username;
        $stock->description = $request->input('description');

        if ($request->input('mode') == 'In') {
            $item_stock = $item_qty + $request->input('stock');
            $item_find->update(['item_quantity' => $item_stock]);

            $stock->stock_out_qty = 0;
            $stock->stock_in_qty = $request->input('stock');
        } else {
            $item_stock = $item_qty - $request->input('stock');
            $item_find->update(['item_quantity' => $item_stock]);

            $stock->stock_in_qty = 0;
            $stock->stock_out_qty = $request->input('stock');
        }
        $stock->save();
        $request->session()->flash('success', 'Stock have added successfully!');
        return redirect('inventory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock, Items $items)
    {
        //
        $stock_find = $stock->FindOrFail($request->id);
        $item_id = $stock_find->item_id;

        $item_find = $items->FindOrFail($item_id);
        $item_qty = $item_find->item_quantity;

        // Kembalikan Hasil Stok
        $stock_in = $request->input('stock_in');
        $stock_out = $request->input('stock_out');
        $old_qty = $item_qty - $stock_find->stock_in_qty + $stock_find->stock_out_qty;

        $new_qty = $old_qty + $stock_in - $stock_out;

        $stock_find->update([
            'user_id' => $request->input('user'),
            'item_id' => $request->input('item'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
            'updated_by' => auth()->user()->username,
            'stock_date' => now(),
            'stock_in_qty' => $stock_in,
            'stock_out_qty' => $stock_out,
            
        ]);
        $item_find->update([
            'item_quantity' => $new_qty
        ]);
        
        $request->session()->flash('editsuccess', 'Stock updated successfully!');
        return redirect('inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock, Items $items, $id)
    {
        //
        $stock_find = $stock->FindOrFail($id);
        $item_id = $stock_find->item_id;

        $item_find = $items->FindOrFail($item_id);
        $item_qty = $item_find->item_quantity;

        $stock_in = $stock_find->stock_in_qty;
        $stock_out = $stock_find->stock_out_qty;

        $stock_all = $item_qty - $stock_in + $stock_out;
        $item_find->update([
            'item_quantity' => $stock_all
        ]);
        $stock_find->delete();

        return response()->json(['deletesuccess' => 'Stock deleted successfully!']);
    }
}
