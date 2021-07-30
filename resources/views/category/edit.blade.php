@extends('layouts.app') 

 @section('content') 
 
    <div class="container"> 
 
        <h3>Edit Data Category</h3>  
        <form action="{{ url('/category/' . $row->id) }}" method="POST">
            <input type="_method" type="hidden" value="PATCH">
          @csrf
          <div class="form-group">
                <label for="">ID</label>
                <input type="text" name="id" class="form-control" value="{{ $row->id}}" >
            </div>
            <div class="form-group">
                <label for="">NAMA</label>
                <input type="text" name="name" class="form-control" value="{{ $row->name}}">
            </div>
            <div class="form-group">
                <label for="">TEXT</label>
                <textarea name="text" class="form-control">{{ $row->text}}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="UPDATE" class="btn btn-primary">
            </div>


 @endsection 