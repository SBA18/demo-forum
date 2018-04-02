@extends('layouts.app')

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
                    <li class="breadcrumb-item active" aria-current="page">{{ $topic->title }}</li>
                </ol>
            </nav>
        </div>
        
    </div>
    
    <div class="row justify-content-center"> 
        <div class="col-md-12">
            {{-- Topic --}}
            <div class="panel panel-white post panel-shadow">
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="{{ route('user', $topic->user->uuid) }}"><b>{{ $topic->user->name }}</b></a> 
                        </div>
                    <h6 class="text-muted time">{{ $topic->created_at->diffForHumans() }}</h6>
                    </div>
                    <p class="text-right">
                        @auth
                            @if($reply_counter === 0)

                                <a href="{{route('topics.edit', $topic->slug)}}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                <a href="{{route('topics.destroy', $topic->slug)}}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                            
                            @else
                            
                                <a href="{{route('topics.edit', $topic->slug)}}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></a>

                            @endif
                        @endauth
                    </p>
                </div> 
                <div class="post-description">
                    {{-- Like and Dislike system --}}
                    <p>{{ $topic->message }}</p>
                    <div class="stats">
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-up icon"></i>2
                        </a>
                        <a href="#" class="btn btn-default stat-item">
                            <i class="fa fa-thumbs-down icon"></i>12
                        </a>
                    </div>
                  
                </div>
                
            </div> <!-- End Topic section  -->
            <br>
            {{--  Replies  --}}
            @if($reply_counter != null)
                @foreach($topic->replies as $reply)
                <div class="panel panel-white post panel-shadow">
                    <div class="post-heading">
                        <div class="pull-left image">
                            <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                        </div>
                        <div class="pull-left meta">
                            <div class="title h5">
                                <a href="{{ route('user', $reply->user->uuid) }}"><b>{{ $reply->user->name }}</b></a>
                            </div>
                        <h6 class="text-muted time">{{ $reply->created_at->diffForHumans() }}</h6>
                        </div>
                        <p class="text-right">
                            @auth
                            <a href="{{ route('edit_reply', $reply->id) }}" class="btn btn-warning btn-sm" ><i class="far fa-edit"></i></a>
                            <a href="{{ route('delete_reply', $reply->id) }}" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                            @endauth
                        </p>
                    </div> 
                    <div class="post-description"> 
                        <p>{{ $reply->reply }}</p>
                        <div class="stats">
                            <a href="#" class="btn btn-default stat-item">
                                <i class="fa fa-thumbs-up icon"></i>2
                            </a>
                            <a href="#" class="btn btn-default stat-item">
                                <i class="fa fa-thumbs-down icon"></i>12
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach

                {{--  {{ $topic->replies->links() }}  --}}


            @else
                <div class="panel panel-white post panel-shadow alert alert-warning">
                    <span class="">No replies yet ! Be the first to answer at this topic</span> 
                </div>
            
            @endif
            {{-- End Replies section --}}
        </div>
        {{-- Reply form --}}
        <div class="col-md-12" style="margin-top:30px;">
            <div class="panel panel-white post panel-shadow">
                <div class="post-description">
                @auth
                <form action="{{ route('post_reply', $topic->slug)}}" method="post">
                    @csrf
                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                        <div class="form-group">
                            <label for="message">Quick Reply</label>
                            <textarea class="form-control{{ $errors->has('reply') ? ' is-invalid' : '' }}" name="reply" id="reply" rows="3"></textarea>
                            @if ($errors->has('reply'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('reply') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-default">Reply</button>
                    </form>
                    @else
                <p>To reply and interact with the forum members, Please <a href="{{ route('register') }}">Sign up</a> or <a href="{{ route('login') }}">login</a>. Thanks</p>
                    @endauth
                </div>
            </div>
        </div>
        {{-- End Reply Form --}}
    </div>    
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> <i class="far fa-exclamation-circle"></i>  Alert</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p class="alert alert-danger"><i class="far fa-exclamation-circle"></i>  <strong>You are not allowed to delete a topic with answers !</strong> </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

@endsection