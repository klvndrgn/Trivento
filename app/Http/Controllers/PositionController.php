<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $showPosition = Position::where('position_name','LIKE','%'.$request->search.'%')->get();
        }else{
            $showPosition = Position::all();
        }

        return view('masterposition', compact('showPosition'));
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
            'positionname' => 'required|unique:t_position,position_name'
        ]);

        $position = new Position;

        $position->position_name = $request->input('positionname');

        $position->save();

        $request->session()->flash('success','Position added successfully!');

        return redirect('masterposition');
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
        $position = Position::FindOrFail($request->position_id);
        $position->update($request->all());
        $request->session()->flash('editsuccess','Position updated successfully!');
        
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
        $position = Position::FindOrFail($id);
        $position->delete();
        return response()->json(['deletesuccess'=>'Position deleted successfully!']);
    }
}
