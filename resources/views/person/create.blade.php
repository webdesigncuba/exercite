@extends('layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Create Person</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('person.save')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
                          
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                           
                            <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" required >  
                            @if($errors->has('email'))
                                <br>

                                <strong class="alert alert-danger">{{ $errors->first('email')}}</strong>
                                <br>
                            @endif
                            
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <select name="contact_id">
                                @foreach($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->code }}{{ $contact->number }}</option>
                                @endforeach
                            </select>
                        </div>
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