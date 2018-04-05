@extends('layouts.app')

@section('title', 'Settings')

@section('custom_css')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <img src="https://infohandle.net/wp-content/uploads/2017/10/5.png" alt="" width="1140">
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            {{ $user->name }}
        </div>
    </div>
</div>
@endsection

@section('custom_js')

@endsection