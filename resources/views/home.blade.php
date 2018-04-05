@extends('layouts.app')

@section('title', 'Dashboard')

@section('custom_css')

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>

@endsection


@section('content')

<div class="container">
    <div class="row">
      <div class="col-lg-12 col-sm-12 col-12 main-section text-center">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 profile-header"></div>
            </div>
            <div class="row user-detail">
                <div class="col-lg-12 col-sm-12 col-12">
                    <img src="http://nicesnippets.com/demo/man01.png" class="rounded-circle img-thumbnail">
                    <h5>{{ Auth::user()->name }}</h5>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> New Jersey, USA.</p>

                    <hr>
                    <a href="#" class="btn btn-success btn-sm">Topics : {{Auth::user()->topics->count() }}</a>
                    <a href="#" class="btn btn-info btn-sm">Replie(s) : {{Auth::user()->replies->count() }}</a>

                    <hr>
                    <h1>My Topics</h1>

                    <table class="table table-striped" id="home_topics_table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Auth::user()->topics as $topic)
                            <tr>
                            <th scope="row">{{$topic->id}}</th>
                            <td><a href="{{ route('topics.show', $topic->slug) }}">{{str_limit($topic->title, 50)}}</a></td>
                            <td>{{$topic->created_at->diffForHumans()}}</td>
                            <td>

                                <a href="{{route('topics.edit', $topic->slug)}}"><i class="far fa-edit"></i></a> |

                                @if($topic->replies->count() === 0)
                                    <a href="{{route('topics.destroy', $topic->slug)}}" class="btn btn-default btn-sm" onclick="event.preventDefault();
                                        document.getElementById('delete-form').submit();"><i class="far fa-trash-alt"></i></a>
                                    <form id="delete-form" action="{{route('topics.destroy', $topic->slug)}}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                    </form> 
                                @else
                                <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></a>
                                
                                @endif
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <hr>
                    <h1>My Replies</h1>

                    <table class="table table-striped" id="home_replies_table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Reply</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach(Auth::user()->replies as $reply)
                            
                            <tr>
                                <th scope="row">{{$reply->id}}</th>
                                <td><a href="{{ route('topics.show', $reply->topic->slug) }}">{{str_limit($reply->reply, 50)}}</a></td>
                                <td>{{$reply->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('edit_reply', $reply->id)}}"><i class="far fa-edit"></i></a> |

                                    <a href="{{route('destroy_reply', $reply->id)}}" class="btn btn-default btn-sm" onclick="event.preventDefault();
                                        document.getElementById('delete-form-reply').submit();"><i class="far fa-trash-alt"></i></a>
                                        <form id="delete-form-reply" action="{{route('destroy_reply', $reply->id)}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                    <span>Lorem ips consectetur adipisium ,eiusmod tempor incididuin reprehendeanim.</span>
                </div>
            </div>
            <div class="row user-social-detail">
                <div class="col-lg-12 col-sm-12 col-12">
                    <a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a>
                    <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                </div>
            </div>
      </div>
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



@section('custom_js')

<script>
    $(document).ready( function () {
        $('#home_topics_table').DataTable({
            "order": [[ 2, "desc" ]],
        });
        $('#home_replies_table').DataTable({
            "order": [[ 2, "desc" ]],
        });
        
    } );
</script>
@endsection
