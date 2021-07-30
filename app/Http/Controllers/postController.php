<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.add');
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
                'id' =>  'bail|required|unique:tb_post',
                'date' => 'required'

            ],
            [
                'id.required' => 'ID Wajib Diisi',
                'date.required' => 'Date Wajib Diisi'
            ]
        );

        post::create([
            'id' => $required->id,
            'date' => $required->date,
    
        ]);

        return redirect('/post');
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
        $row = posix_getcwd::findOrFail($id);
        return view('post.edit', compact('row'));
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

        $row = post::findOrFail($id);
        $row->update([
            'id' =>$request->id,
            'date' =>$request->date
        ]);

        return redirect('/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = post::findOrFail($id); 
        $row->delete(); 

        return redirect('/post');
    }
}
