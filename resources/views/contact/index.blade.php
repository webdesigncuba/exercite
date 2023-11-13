@extends('layout.base')
@section('content')
<div class="container">
    <h1 class="text-center mt-5">Contact</h1>
    <div class="container">
        <div class="border-bottom"></div>
    </div>
    <br>
    <ul>
        <li><a href="/contact/create" class="btn btn-success">Add new Coontact</a></li>
    </ul>
    <div class="d-flex align-items-center justify-content-center">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code Name</th>
                    <th scope="col">Number</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    <td>{{$contact->code}}</td>
                    <td>{{$contact->number}}</td>
                    <td> 
                        @auth
                        <a class="btn btn-sm btn-success" href="{{ route('contact.edit' , ['id'=>$contact->id] )}}">Edit</a>
                        <a class="btn btn-sm btn-danger" href="{{ route('contact.delete' , ['id'=>$contact->id] )}}">Delete</a>   
                        @endauth
                   
                    </td>
                </tr>
                @endforeach
                <tr>
            </tbody>
        </table>
    </div>
</div>

@stop