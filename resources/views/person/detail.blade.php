@extends('layout.base')
@section('content')
<div class="container">
    <h1 class="text-center mt-5">Details Person</h1>
    <div class="container">
        <div class="border-bottom"></div>
    </div>
    <br>
    <ul>

    </ul>
    <div class="d-flex align-items-center justify-content-center">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <th scope="row">{{$persons->id}}</th>
                    <td>{{$persons->name}}</td>
                    <td>{{$persons->email}}</td>
                    <td>{{$persons->contact->number}}</td>
                    <td> 
                        <a class="btn btn-sm btn-success" href="{{ route('person.edit' , ['id'=>$persons->id] )}}">Edit</a>
                        <a class="btn btn-sm btn-danger" href="{{ route('person.delete' , ['id'=>$persons->id] )}}">Delete</a>  
                    </td>
                </tr>
              
                <tr>
            </tbody>
        </table>
    </div>
</div>
@stop