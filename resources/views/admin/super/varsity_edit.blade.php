@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit University</h4>
    </div>
    <div class="card-body">
        {{Form::open(['route'=>['admin.varsity_update', $varsity->id], 'method'=>'POST'])}}
        @csrf 
        {{method_field('PUT')}}
        <div class="form-group">
            <input type="text" name="name" value="{{$varsity->name}}" class="form-control" placeholder="Enter University Name" required>
        </div><br>
        <div class="form-group">
            <input type="text" name="address" value="{{$varsity->address}}" class="form-control" placeholder="Enter University Address" required>
        </div><br>
        <div class="form-group">
            <input type="number" name="contact" value="{{$varsity->contact}}" class="form-control" placeholder="Enter University Contact Number" required>
        </div><br>
        <input type="submit" value="Save" class="btn btn-primary">

        {{Form::close()}}
    </div>
</div>

@endsection