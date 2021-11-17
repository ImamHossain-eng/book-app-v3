@extends('layouts.admin')
@section('content')
<body>
   <div class="card">
       <div class="card-header">
           <h4>Manage Admin</h4>
       </div>
       <div class="card-body">
           <a href="/admin/user/admin/create" class="btn btn-primary">Add New Admin</a>
           <table class="table table-responsive table-border table-light">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>User Type</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $key => $user)
                    <tr @if($user->id == 1)
                            class="table-danger"
                        @else
                         class="table-warning"
                        @endif >
                        <td> {{$key+1}} </td>
                        <td> {{$user->name}} </td>
                        <td> {{$user->email}} </td>
                        <td> {{$user->created_at->diffForHumans()}} </td>
                        <td>
                            @if($user->id == 1)
                                Super Admin
                            @else 
                                Admin
                            @endif
                        </td>
                        <td>
                            @if(Auth::user()->is_admin == 1)
                                <a href="#" class="btn btn-primary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if(AUth::user()->id == 1)
                                    <a href="/admin/user/admins/{{$user->id}}/edit" class="btn btn-success">
                                        <i class="fa fa-check"></i>
                                    </a>
                                @endif
                                @if(Auth::user()->id == 1 && Auth::user()->id !== $user->id)
                                    {{Form::open(['route'=>['admin.admin_destroy', $user->id], 'method'=>'DELETE', 'style'=>'display:inline;'])}}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    {{Form::close()}}
                                @endif
                            @endif
                        </td>
                    </tr>                    
                @empty
                    <tr>
                        <td colspan="5">COming Soon</td>
                    </tr>
                        
                @endforelse
        
            </tbody>
        </table>
       </div>
   </div>
</body>
@endsection