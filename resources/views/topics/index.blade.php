@extends('layouts.app')

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

                    <table id="topic_table" class="table table-striped">
                        @if($topic_counter != null)
                        <thead>

                            <tr>
                                <th scope="col" style="width:650px;">Topics</th>
                                <th scope="col" style="text-align:center;">Answers</th>
                                <th scope="col">Last message</th>
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
                                @if($topic->replies->count() != null)
                                <td>Replied by <a href="#">{{ $lastresponse->user->name }}</a> {{$lastresponse->created_at->diffForHumans()}}</td>
                                @else
                                <td>Posted by <a href="#">{{ $topic->user->name }}</a> {{$topic->created_at->diffForHumans()}}</td>
                                @endif
                            </tr>
                            @endforeach
                            
                        </tbody>

                    </table>

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

<script>
    // $(document).ready( function () {
    //     $('#topic_table').DataTable();
    // } );
</script>

@endsection