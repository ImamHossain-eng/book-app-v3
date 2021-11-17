@extends('layouts.user')
@section('content')
<body>
    <div class="card">
        <div class="card-header">
            <h4>Adding New Book</h4>
        </div>
        <div class="card-body">
            {{Form::open(['route' => 'user.book_store', 'method' => 'POST', 'enctype'=>'multipart/form-data'])}}
                <div class="form-group">
                    <input type="text" name="name" placeholder="Enter Book Name" class="form-control">
                </div><br>
                <div class="form-group">
                    <input type="text" name="author" placeholder="Enter Book Author Name" class="form-control">
                </div><br>
                <div class="form-group">
                    <input type="number" name="price" placeholder="Enter Book Price" class="form-control">
                </div><br>
                <div class="form-group">
                    <input type="number" name="number" placeholder="Enter Mobile Number" class="form-control">
                </div><br>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div><br>
                <select name="category" class="form-control">
                    <option value="null">Choose Book Type....</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}"> {{$type->type}} </option>
                    @endforeach
                </select><br>
                <div class="from-group">
                    <label for="description">Book Description</label>
                    <textarea name="description" id="ckview" cols="30" rows="10"></textarea>
                </div><br>
                <input type="submit" value="Save" class="btn btn-primary">
            {{Form::close()}}
        </div>
    </div>
</body>

@endsection