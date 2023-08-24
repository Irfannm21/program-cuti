<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


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
     * @param  \App\TransaksiCuti  $transaksiCuti
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiCuti $transaksiCuti)
    {
        //
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
        //
    }
}
