@extends('layouts.app')

@section('content')

<div class="container"> 
    <h3>DAFTAR POST
    <a href="{{ url('/post/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
    </h3>

        <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>DATE</th>
                        <th>TITLE</th>
                        <th>TEXT</th>
                        <th>CATEGORY_ID</th>
                        <th>EDIT</th>
                        <th>DELETE</th>                        
                     </tr>
            @foreach($rows as $row) 
                     <tr> 
                        <td>{{ $row->id }}</td> 
                        <td>{{ $row->date}}</td> 
                        <td>{{ $row->title}}</td> 
                        <td>{{ $row->text }}</td> 
                        <td>{{ $row->category_id }}</td> 
                        <td><a href="{{ url('post/' . $row->id . '/edit') }}"class="btn btn-primary btn-sm float-right" >EDIT</a></td>
                        <td>
                        <form action="{{ url('/post/' . $row->id) }}" method="POST"> 
                        <input name="_method" type="hidden" value="DELETE"> 
                        @csrf 
                        <button class="btn btn-danger btn-sm" >DELETE</button> 
                        </form> 
                        </td>
 
                    </tr> 
            @endforeach
         </table>
    </div> 
@endsection 