@extends('layouts.app')

@section('title', 'Create new topic')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            
        </div>

        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">New Topic</h5>
                <div class="card-body">

                <form action="{{ route('topics.store') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label for="title">Topic title</label>
                            <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Topic title" value="{{ old('title') }}" required>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
      
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" id="message" rows="3" required >{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-default">Create</button>
                    </form>

                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
       
    </div>
    
</div>
@endsection

@section('custom_js')



@endsection