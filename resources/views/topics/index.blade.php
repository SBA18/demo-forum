@extends('layouts.app')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>
@endsection

@section('title', 'Topics')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Topics</li>
                </ol>
            </nav>
            
        </div>

        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">General Support</h5>
                <div class="card-body">

                    <table id="myTable" class="table table-striped">
                        @if($topic_counter != null)
                            <thead>

                                <tr>
                                    <th scope="col" style="width:500px;">Topics</th>
                                    <th scope="col" style="text-align:center;">Answers</th>
                                    <th scope="col">Posted By</th>
                                    <th scope="col">Posted At</th>
                                </tr>

                            </thead>
                        @else
                            <p>No Topics created yet !!! Click <a href="{{ route('topics.create') }}"> <strong>here</strong> </a> to create you first Topic</p>
                        @endif
                        
                        <tbody>
                            @foreach($topics as $topic)
                            <tr>
                            <td><a href="{{ route('topics.show', $topic->slug) }}">{{ $topic->title }}</a></td>
                                <td style="text-align:center;">
                                    @if($topic->replies->count() != null)
                                        {{ $topic->replies->count() }}
                                    @else

                                        0

                                    @endif
                                </td>

                                <td>Posted by <a href="{{ route('user', $topic->user->uuid) }}">{{ $topic->user->name }}</a> {{$topic->created_at->diffForHumans()}}</td>
                                <td>{{$topic->updated_at->toDateTimeString()}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>

                    </table>
                    <ul class="pagination justify-content-end">
                    </ul>
                </div>
                <div class="card-footer text-muted">
                 
                        Online users :
                   
                </div>
            </div>
        </div> 
       
    </div>
    <div class="row justify-content-center" style="margin-top:20px;">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Forum</h5>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae ea ut itaque molestiae, cupiditate ipsa ullam non aut fugit illo repellat voluptates eaque quisquam dicta repellendus dolorum? Delectus, accusantium quia.</p>
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
<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>

<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            "order": [[ 3, "desc" ]],
        });
        
    } );
</script>
@endsection