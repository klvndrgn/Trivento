<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Transfer;
use App\Models\Users;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataUser = Users::all();
        
        $dataItem = Items::select('id','item_name')->whereNotIn('id', Transfer::where('return_date', null)->pluck('item_id')->toArray())->orderBy('item_name', 'ASC')->get();

        $dataReturnItem = Transfer::distinct('item_id')->where('return_date', null)->get();

        if($request->has('search')){
            $showTransfer = Transfer::where('item_id','LIKE','%'.$request->search.'%')->where('return_date', null)->get();
        }else{
            $showTransfer = Transfer::all()->where('return_date', null);
        }

        return view('transfer', compact('showTransfer','dataUser','dataItem', 'dataReturnItem'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataUser = Users::all();

        return view('transfer', compact('dataUser'));
    }

    public function Taken()
    {
        $id = $_GET['id'];
        $TakenBy = Transfer::select('return_date')->where('item_id', $id)->whereNotNull('return_date')->orderBy('id', 'DESC')->get(); 

        $TakenBy2 = $TakenBy->toArray();
        if(count($TakenBy2) <> 0){
            return response()->json([
                'answer' => $TakenBy[0],
            ]);
        }
        else{
            return response()->json([
                'answer' => "",
            ]);
        }
        
    }

    public function Return()
    {
        $id = $_GET['id'];
        $TakenBy = Transfer::select('id','username', 'taken_date')->where('item_id', $id)->where('return_date', null)->get(); 
        $TakenBy2 = $TakenBy->toArray();

        $TakenBy3 = Users::select('username')->where('id', $TakenBy2[0]["username"] )->get(); 

        return response()->json([
            'answer' => $TakenBy[0],
            'username' => $TakenBy3[0]
        ]);
    }


    public function EditTaken()
    {
        $id = $_GET['id'];
        $TakenBy = Transfer::select('return_date')->where('item_id', $id)->whereNotNull('return_date')->orderBy('id', 'DESC')->get(); 
        
        return response()->json([
            'answer' => $TakenBy[0],
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('takendate')){
            $carbon = \Carbon\Carbon::parse($request->input('takendate'));
            $carbon->format('Y-m-d H:i:s');
            $carbon2 = \Carbon\Carbon::parse($request->input('validatereturndate'));
            $carbon2->format('Y-m-d H:i:s');
            $this->validate($request,[
                'username' => 'required',
                'itemid' => 'required',
                'takendate' => 'required',
                'takenissue' => 'required',
            ]);
            if($request->input('validatereturndate') <> ""){
                $request['taken_datetime'] = $carbon;
                $returnDate = $carbon2;
            $this->validate($request,[
                'taken_datetime'   =>  'after:'.$returnDate,
            ]);
            }
        }
            elseif($request->has('returndate')){
                $this->validate($request,[
                    'username' => 'required',
                    'itemid' => 'required',
                    'returndate' => 'required',
                    'returnissue' => 'required',
                ]);
            }
         
    
            $Transfer = new Transfer;
    
            $Transfer->username = $request->input('username');
            $Transfer->item_id = $request->input('itemid');
            if($request->has('takendate')){
            $Transfer->taken_date = $request->input('takendate');
            $Transfer->taken_issue = $request->input('takenissue');
            }
            elseif($request->has('returndate')){
            $Transfer->return_date = $request->input('returndate');
            $Transfer->return_issue = $request->input('returnissue');
            }
    
            $Transfer->save();
    
            $request->session()->flash('success','Transfer added successfully!');
    
            return redirect('transfer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->has('edittakendate')){
            $carbon = \Carbon\Carbon::parse($request->input('edittakendate'));
            $carbon->format('Y-m-d H:i:s');
            $carbon2 = \Carbon\Carbon::parse($request->input('editreturndate'));
            $carbon2->format('Y-m-d H:i:s');
            if($request->input('editreturndate') <> ""){
                $request['taken_date_time'] = $carbon;
                $returnDate = $carbon2;
                $this->validate($request,[
                    'taken_date_time'   =>  'after:'.$returnDate
                ]);
            }
            $Transfer = Transfer::FindOrFail($request->Transferid);
            $Transfer->username = $request->input('username');
            $Transfer->item_id = $request->input('edititemid');
            $Transfer->taken_date = $request->input('edittakendate');
            $Transfer->taken_issue = $request->input('edittakenissue');
        }
        elseif($request->has('returndate')){
            $carbon = \Carbon\Carbon::parse($request->input('returndate'));
            $carbon->format('Y-m-d H:i:s');
            $carbon2 = \Carbon\Carbon::parse($request->input('validatetakendate'));
            $carbon2->format('Y-m-d H:i:s');
            $request['return_datetime'] = $carbon;
            $takenDate = $carbon2;
            $request->validate([
                'return_datetime'   =>  'after:'.$takenDate,
            ]);

            $Transfer = Transfer::FindOrFail($request->Transferid2);
            $Transfer->item_id = $request->input('ReturnItemId');
            $Transfer->return_date = $request->input('returndate');
            $Transfer->return_issue = $request->input('returnissue');
            }
            $Transfer->update();
            $request->session()->flash('editsuccess','Transfer data updated successfully!');
            
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Transfer = Transfer::FindOrFail($id);
        $Transfer->delete();
        return response()->json(['deletesuccess' => 'Transfer data deleted successfully!']);
    }
}
