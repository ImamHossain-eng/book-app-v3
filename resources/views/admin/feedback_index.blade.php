@extends('layouts.admin')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h4>Feedback Index</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($feedbacks as $key => $feedback)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> <a href="/admin/feedback/{{$feedback->id}}">
                                {{$feedback->name}}
                            </a>
                        </td>
                        <td> {{$feedback->email}} </td>
                        <td> {{$feedback->phone}} </td>
                        <td>
                            <a href="/admin/feedback/{{$feedback->id}}" class="btn btn-primary">
                                <i class="fa fa-eye"></i>
                            </a>
                            {{Form::open(['method'=>'DELETE', 'route'=>['admin.feedback_destroy',$feedback->id],'style'=>'display:inline;']) }}
                            <button type="submit" style="display:inline;" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                            {{Form::close()}}
                        </td>
                    </tr>
                    @empty
                    <tr class="table-warning">
                        <td colspan="5">
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