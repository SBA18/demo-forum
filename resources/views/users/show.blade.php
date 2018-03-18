@extends('layouts.app')

@section('custom_css')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                </ol>
            </nav>
        </div>  
    </div>

    <div class="row justify-content-center"> 
        <div class="col-md-12">
        <p>{{$user->name}}</p>
        </div>
    </div>
</div>

@endsection

@section('custom_js')

@endsection