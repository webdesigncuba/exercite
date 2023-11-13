@extends('layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit contact</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('contact.update',$contacts->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Code</label>
                            <select name="code">
                                @foreach($callingCodes as $callingCode)
                                    <option value="{{ $callingCode }}">{{ $callingCode }}</option>
                                @endforeach
                            </select>
                          
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">number</label>
                            <input type="text" class="form-control" id="email" placeholder="Number" name="number" required value="{{$contacts->number}}" >  
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