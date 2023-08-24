<?php

namespace App\Http\Controllers\Admin;

use App\masterKaryawan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Auth::guest());
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
     * @param  \App\masterKaryawan  $masterKaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(masterKaryawan $masterKaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\masterKaryawan  $masterKaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(masterKaryawan $masterKaryawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\masterKaryawan  $masterKaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, masterKaryawan $masterKaryawan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\masterKaryawan  $masterKaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(masterKaryawan $masterKaryawan)
    {
        //
    }
}
