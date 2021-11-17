@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h4>All Available Category of Books</h4>
        </div>
        <div class="card-body">
            <a href="/admin/book/type/create" class="btn btn-primary">Add New Category</a>
            <br>
            <table class="table table-hover table-striped table-border table-responsive">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($types as $key => $type)
                        <tr>
                            <td> {{$key+1}} </td>
                            <td> {{$type->type}} </td>
                            <td> {{$type->created_at->diffForHumans()}} </td>
                            <td>
                                {{Form::open(['method'=>'DELETE', 'route'=>['admin.type_destroy',$type->id],'style'=>'display:inline;']) }}
                                <button type="submit" style="display:inline;" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                {{Form::close()}}
                            </td>
                        </tr>
                    @empty
                        <tr class="table-warning">
                            <td colspan="4">
                                <center>Coming Soon</center>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>


@endsection