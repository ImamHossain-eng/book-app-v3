@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h4>Available Univarsity List</h4>
            </div>
        </div>
        <div class="card-body">
            <a href="/admin/varsity/create" class="btn btn-primary">Add University</a><br>
            <table class="table table-light table-responsive table-bordered">
                <thead><br>
                    <tr>
                        <th>Serial</th>
                        <th>ID </th>
                        <th>University Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Inserted At</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($varsities as $key => $varsity)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$varsity->id}} </td>
                        <td> {{$varsity->name}} </td>
                        <td> {{$varsity->address}} </td>
                        <td> +880{{$varsity->contact}} </td>
                        <td> {{$varsity->created_at->diffForHumans()}} </td>
                        <td>
                            <a href="/admin/varsity/{{$varsity->id}}/edit" class="btn btn-success">
                                <i class="fa fa-check"></i>
                            </a>
                            {{Form::open(['method'=>'DELETE', 'style'=>'display:inline;', 'route'=>['admin.varsity_destroy', $varsity->id]])}}
                            <button class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            {{Form::close()}}
                        </td>
                    </tr>
                    @empty 
                    <tr class="table-warnig">
                        <td colspan="6"><center>No Data</center></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
@endsection