<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataBrand = Brand::all();

        if ($request->has('search')) {
            $showItems = Items::where('item_name', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $showItems = Items::all();
        }

        return view('masteritem', compact('showItems', 'dataBrand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataBrand = Brand::all();

        return view('masteritem', compact('dataBrand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->input('mode') == 'isConsumable'){
            Validator::make($request->all(), [
                'name' => 'required|unique:t_item,item_name',
                'category' => 'required',
                'model' => 'required',
                'brand' => 'required',
                'image' => 'required|image|file|max:1024|mimes:jpeg,jpg,png',
                'quantity' => 'required',
            ])->validateWithBag('consumable');
        }else{
            Validator::make($request->all(), [
                'name' => 'required|unique:t_item,item_name',
                'category' => 'required',
                'model' => 'required',
                'brand' => 'required',
                'image' => 'required|image|file|max:1024|mimes:jpeg,jpg,png',
                'quantity' => 'required',
            ])->validateWithBag('asset');
        }

        $path = $request->file('image')->store('item-images');

        $item = new Items();

        $item->item_name = $request->input('name');
        $item->item_category = $request->input('category');
        $item->item_model = $request->input('model');
        $item->item_brand = $request->input('brand');
        $item->item_image = $path;
        $item->item_remark = $request->input('remarks');
        $item->item_quantity = $request->input('quantity');

        $item->save();

        $request->session()->flash('success', 'Item added successfully!');

        return redirect('masteritem');
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
        $item = Items::FindOrFail($request->item_id);

        // if ($request->hasFile('image')) {
        //     $request->validate([
        //         'image' => 'required|image|file|max:1024|mimes:jpeg,jpg,png',
        //     ]);
        //     $path = $request->file('image')->store('item-images');
        //     $item->image = $path;
        // }

        $item->update($request->all());
        $request->session()->flash('editsuccess', 'Item updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Items::FindOrFail($id);
        $item->delete();
        return response()->json(['deletesuccess' => 'Item deleted successfully!']);
    }
}
