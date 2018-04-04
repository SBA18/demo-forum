@extends('layouts.app')

@section('title', 'Members')

@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Forum Members</li>
                </ol>
            </nav>
        </div>  
    </div>
    <div class="row">
        @foreach($users as $user)
        <div class="col-md-4 col-sm-12" style="margin-bottom: 10px;">
            <div class="card">
                <div class="panel panel-white post panel-shadow">
                    <div class="post-heading">
                        <div class="pull-left image">
                            <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                        </div>
                        <div class="pull-left meta">
                            <div class="title h5">
                                <a href="{{route('user', $user->uuid)}}"><b>{{$user->name}}</b></a> 
                            </div>
                            <h6 class="text-muted time " >
                                <span class="alert alert-info" style="padding-top:0px; padding-bottom: 0px">Topics : {{$user->topics->count()}}</span> |  
                                <span class="alert alert-info" style="padding-top:0px; padding-bottom: 0px">Replies : {{$user->replies->count()}}</span>
                            </h6>
                        </div>
                    </div>
                </div> <!-- End Topic section  -->
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center" style="margin-top: 15px">
        <div class="col-md-4">
                {{ $users->links()}}
        </div>
    </div>
</div>
@endsection

@section('custom_js')
@endsection