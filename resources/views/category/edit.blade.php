@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="">Category</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name',$category->name)}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
