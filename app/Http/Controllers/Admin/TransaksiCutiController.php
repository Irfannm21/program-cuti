<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\masterKaryawan;
use App\TransaksiCuti;
use App\DataCuti;
use Illuminate\Http\Request;

class TransaksiCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = TransaksiCuti::all();
        return view("admin.transcuti.index",compact("results"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $results = masterKaryawan::all();

       return view("admin.transcuti.create",compact("results"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiCuti  $transaksiCuti
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return "Method Show";
        // return masterKarya   wan::where("nip",$request->nip)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiCuti  $transaksiCuti
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiCuti $transaksiCuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiCuti  $transaksiCuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiCuti $transaksiCuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiCuti  $transaksiCuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiCuti $transaksiCuti)
    { 
        // the decision ID1401 the secret of relationship ID1525 
    }

    public function cari(Request $request) {
        return masterKaryawan::where("nip",$request->val)->first();
    }
    
    public function jenis(Request $request) {
        $employe =  masterKaryawan::where('nip',$request->val_2)->first();
        return Datacuti::where('jenis',$request->val)->where('jenis',$request->val)->get();
        // return $employe->id;
    }
}
