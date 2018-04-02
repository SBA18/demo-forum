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
            <div class="card">
                <h5 class="card-header">{{$user->name}}</h5>
                <div class="card-body">
                    <h3>User Topics</h3>
                    <table id="myTable" class="table table-striped">
                        @if($topic_counter != 0)
                        <thead>
                            <tr>
                                <th scope="col" style="width:650px;">Topics</th>
                                <th scope="col">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->topics as $user_topic)
                            <tr>
                                <td><a href="{{route('topics.show', $user_topic->slug)}}">{{ $user_topic->title }}</a></td>
                                <td>{{ $user_topic->created_at->diffForHumans() }}</td> 
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <p class="alert alert-info">User has not submitted topics yet !</p>
                        @endif
                    </table>
                    <ul class="pagination justify-content-end">
                    </ul>

                    <br>
                    <h3>User Replies</h3>
                    <table id="myTable" class="table table-striped">
                        @if($reply_counter != 0)
                        <thead>
                            <tr>
                                <th scope="col" style="width:650px;">Replies</th>
                                <th scope="col">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user->replies as $user_replies)
                            <tr>
                                <td><a href="{{route('topics.show', $user_replies->topic->slug)}}">{{str_limit($user_replies->reply, 50)}}</a></td>
                                <td>{{$user_replies->created_at->diffForHumans()}}</td> 
                            </tr>
                            @endforeach
                        </tbody>
                        @else
                        <p class="alert alert-info">User has not submitted replies yet !</p>
                        @endif
                    </table>
                    <ul class="pagination justify-content-end">
                    </ul>

                   
                </div>
                <div class="card-footer text-muted">
                                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom_js')

@endsection