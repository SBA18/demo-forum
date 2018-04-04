@extends('layouts.app')
@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
@endsection

@section('title', 'Edit topic')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('topics.index') }}">Topics</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('topics.show', $topic->slug) }}">{{$topic->slug}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit your topic -> {{str_limit($topic->message, 10)}} ....</li>
                </ol>
            </nav>
        </div>
        
    </div>
    
    <div class="row justify-content-center"> 
        <div class="col-md-12">
            <div class="panel panel-white post panel-shadow">
                <div class="post-description">
                    <form action="{{ route('topics.update', $topic->slug) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Topic title</label>
                            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" rows="20" value="{{ $topic->title }}" />
                            @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="message">Topic description</label>
                            <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" id="message" rows="20">{{ $topic->message }}</textarea>
                            @if ($errors->has('message'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('message') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-default">Update Topic</button>
                        <a href="{{ route('topics.show', $topic->slug) }}" class="btn btn-default">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection