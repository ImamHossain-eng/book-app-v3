@extends('layouts.admin')
@section('content')
<body>
    <table class="table table-responsive table-border table-light">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>University</th>
                <th>Created</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $key => $user)
                <tr @if($user->is_admin == 1)
                        class="table-warning" 
                    @elseif($user->config== '1')
                     class="table-danger"
                    @else
                     class="table-success"
                    @endif >
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td> @if($user->varsity != '')
                        {{ Varsity::find($user->varsity)->name}}
                        @endif </td>
                    <td> {{$user->created_at->diffForHumans()}} </td>
                    <td>
                        @if($user->config == '1')
                        <h6 style="color:brown;">Unregistered</h6>
                        @elseif($user->config == '0')
                        <h6 style="color:green;">Registered</h6>
                        @else 
                        <h6 style="color:rgba(38, 0, 255, 0.842);">New User</h6>
                        @endif
                    </td>
                    <td>
                        @if(Auth::user()->is_admin == 1)
                            <!--<a href="/admin/users/{{$user->id}}/transaction" class="btn btn-primary">
                                <i class="fa fa-database"></i>
                            </a>-->
                            @if($user->is_admin !== 1)
                                <a href="/admin/users/{{$user->id}}/edit" class="btn btn-success">
                                    <i class="fa fa-check"></i>
                                </a>
                            @endif
                            @if(Auth::user()->id == 1 && Auth::user()->is_admin == 1)
                                {{Form::open(['method'=>'DELETE', 'route'=>['admin.user_destroy',$user->id],'style'=>'display:inline;']) }}
                                <button type="submit" style="display:inline;" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                                {{Form::close()}}
                            @endif
                        @endif
                    </td>
                </tr>                    
            @empty
                <tr class="table-warning">
                    <td colspan="6">
                        <center>Coming Soon</center>
                    </td>
                </tr>
                    
            @endforelse
    
        </tbody>
    </table>
</body>
@endsection