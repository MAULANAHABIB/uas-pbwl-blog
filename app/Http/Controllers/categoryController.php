<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;


class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = category::all();
        return view('category.index', compact('rows')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'id' =>  'bail|required|unique:tb_album',
                'name' => 'required'
            ],
            [
                'id.required' => 'ID Wajib Diisi',
                'name.required' => 'Nama Wajib Diisi'
            ]
        );

        category::create([
            'id' => $required->id,
            'name' => $required->name,
    
        ]);

        return redirect('/category');
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
        $row = category::findOrFail($id);
        return view('category.edit', compact('row'));
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
        $request->validate(
            [
                'id' =>  'bail|required',
                'name => "required'
            ],
            [
                'id.required' => 'ID Wajib Diisi',
                'name.required' => 'Nama Wajib Diisi'
            ]
        );

        $row = category::findOrFail($id);
        $row->update([
            'id' =>$request->id,
            'name' =>$request->name
        ]);

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = category::findOrFail($id); 
        $row->delete(); 

        return redirect('/category');
    }
}
