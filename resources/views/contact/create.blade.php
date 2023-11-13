@extends('layout.base')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Create Contact</h1>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">Country Code</label>
                            <select name="code">
                                @foreach($callingCodes as $callingCode)
                                    <option value="{{ $callingCode }}">{{ $callingCode }}</option>
                                @endforeach
                            </select>
                          
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Country Code</label>
                            <input type="text" class="form-control" id="number" placeholder="Number" name="number" required>
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