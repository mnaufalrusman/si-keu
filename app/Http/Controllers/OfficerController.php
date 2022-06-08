<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfficerReqeust;
use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('officer.index', [
            'title' => 'Karyawan',
            'officers' => Officer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('officer.create', [
            'title' => 'Karyawan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficerReqeust $request)
    {
        $validated = $request->validated();

        Officer::create($validated);

        return redirect('/officer')->with('success', 'Data karyawan berhasil ditamabahkan!');
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
    public function edit(Officer $officer)
    {
        return view('officer.edit', [
            'officer' => $officer,
            'title' => 'Karyawan',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OfficerReqeust $request, Officer $officer)
    {
        $validated = $request->validated();

        Officer::where('id', $officer->id)
            ->update($validated);

        return redirect('/officer')->with('updated', 'Data karyawan berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        Officer::destroy($officer->id);

        return redirect('/officer')->with('deleted', 'Data karyawan berhasil dihapus!');
    }
}
