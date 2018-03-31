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
                <h5 class="card-header">General Support</h5>
                <div class="card-body">
                    <h3>User Topics</h3>
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" style="width:650px;">Topics</th>
                                <th scope="col" style="text-align:center;">Answers</th>
                                <th scope="col">Last message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="">topic title</a></td>
                                <td style="text-align:center;">64654654</td> 
                                <td style="text-align:center;">64654654</td> 
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination justify-content-end">
                        Pagination
                    </ul>


                    <h3>User Replies</h3>
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" style="width:650px;">Topics</th>
                                <th scope="col" style="text-align:center;">Answers</th>
                                <th scope="col">Last message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="">topic title</a></td>
                                <td style="text-align:center;">64654654</td> 
                                <td style="text-align:center;">64654654</td> 
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination justify-content-end">
                        Pagination
                    </ul>

                    <h3>User Activities</h3>
                    <hr>
                </div>
                <div class="card-footer text-muted">
                    
                        Online users :
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom_js')

@endsection