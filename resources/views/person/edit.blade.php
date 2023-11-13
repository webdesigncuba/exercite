@extends('layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Person</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('person.update',$persons->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" required value="{{$persons->name}}">
                          
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required value="{{$persons->email}}" >  
                        </div>
                        <select name="contact_id">
                                @foreach($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->code }}{{ $contact->number }}</option>
                                @endforeach
                            </select>
                        <div class="mb-3 offset-md-10">
                            <input class="btn btn-primary" type="submit">
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop