@extends('layout.base')
@section('content')
<div class="container">
    <h1 class="text-center mt-5">Person</h1>
    <div class="container">
        <div class="border-bottom"></div>
    </div>
    <br>
    <ul>
        <li><a href="/person/create" class="btn btn-success">Add new Person</a></li>
    </ul>
    <div class="d-flex align-items-center justify-content-center">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Avatar</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($persons as $person)
                <tr>
                    <th scope="row">{{$person->id}}</th>
                    <td>{{$person->name}}</td>
                    <td>{{$person->email}}</td>
                    <td><img class="img-fluid" src="{{$person->avatar}}"></td>
                    <td> 
                        <a class="btn btn-sm btn-success" href="{{ route('person.edit' , ['id'=>$person->id] )}}">Edit</a>
                        <a class="btn btn-sm btn-danger" href="{{ route('person.delete' , ['id'=>$person->id] )}}">Delete</a>  
                        <a class="btn btn-sm btn-danger" href="{{ route('person.detail' , ['id'=>$person->id] )}}">Detail</a>    
                    </td>
                </tr>
                @endforeach
                <tr>
            </tbody>
        </table>
    </div>
</div>

@stop