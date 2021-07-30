<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\photos;


class photosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = photos::all();
        return view('photos.index', compact('rows')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.add');
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
                'date' => 'required'
            ],
            [
                'id.required' => 'ID Wajib Diisi',
                'date.required' => 'Date Wajib Diisi'
            ]
        );

        photos::create([
            'id' => $required->id,
            'date' => $required->date,
    
        ]);

        return redirect('/photos');
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
        $row = photos::findOrFail($id);
        return view('photos.edit', compact('row'));
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
                'date => "required'
            ],
            [
                'id.required' => 'ID Wajib Diisi',
                'date.required' => 'Date Wajib Diisi'
            ]
        );

        $row = photos::findOrFail($id);
        $row->update([
            'id' =>$request->id,
            'name' =>$request->date
        ]);

        return redirect('/photos');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = photos::findOrFail($id); 
        $row->delete(); 

        return redirect('/photos');
    }
}
