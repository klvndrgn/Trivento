<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $showBrand = Brand::where('brand_name','LIKE','%'.$request->search.'%')->get();
        }else{
            $showBrand = Brand::all();
        }

        return view('masterbrands', compact('showBrand'));
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
        $this->validate($request,[
            'brandname' => 'required|unique:t_brand,brand_name'
        ]);

        $brand = new Brand;

        $brand->brand_name = $request->input('brandname');

        $brand->save();

        $request->session()->flash('success','Brand added successfully!');

        return redirect('masterbrands');
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
    public function update(Request $request)
    {
        $brand = Brand::FindOrFail($request->brand_id);
        $brand->update($request->all());
        $request->session()->flash('editsuccess','Brand updated successfully!');
        
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
        $brand = Brand::FindOrFail($id);
        $brand->delete();
        return response()->json(['deletesuccess'=>'Brand deleted successfully!']);
    }
}
