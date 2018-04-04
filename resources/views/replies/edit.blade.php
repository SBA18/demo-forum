@extends('layouts.app')

@section('title', 'Edit reply')


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
                    <li class="breadcrumb-item"><a href="{{ route('topics.index') }}">Topics</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('topics.show', $reply->topic->slug) }}">{{$reply->topic->slug}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit your reply -> {{str_limit($reply->reply, 10)}} ....</li>
                </ol>
            </nav>
        </div>
        
    </div>
    
    <div class="row justify-content-center"> 
        <div class="col-md-12">
            <div class="panel panel-white post panel-shadow">
                <div class="post-description">
                    <form action="{{ route('update_reply', $reply->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="message">Update Reply</label>
                            <textarea class="form-control{{ $errors->has('reply') ? ' is-invalid' : '' }}" name="reply" id="reply" rows="20">{{ $reply->reply }}</textarea>
                            @if ($errors->has('reply'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('reply') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-default">Update reply</button>
                        <a href="{{ route('topics.show', $reply->topic->slug) }}" class="btn btn-default">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection