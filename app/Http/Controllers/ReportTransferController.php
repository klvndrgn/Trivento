<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use App\Models\ReportTransfer;
use Illuminate\Http\Request;

class ReportTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            
            $showTransfer = Transfer::where('username', auth()->user()->id)->get();
        }
        else{
            if(!auth()->user()->isAdmin){
                $showTransfer = Transfer::where('username', auth()->user()->id)->get();
            }else{
                $showTransfer = Transfer::all();
            }
            // $showTransfer = Transfer::all();
        }

        return view('reporttransfer', compact('showTransfer'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReportTransfer  $reportTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(ReportTransfer $reportTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReportTransfer  $reportTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(ReportTransfer $reportTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReportTransfer  $reportTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReportTransfer $reportTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReportTransfer  $reportTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReportTransfer $reportTransfer)
    {
        //
    }
}
