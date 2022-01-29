@extends('layouts.master')
@section('content')
    <div class="row my-3">
        <div class="col-md-8">
            <ul class="nav nav-tabs my-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('post.edit',$post->id)}}">Post Edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('post.index')}}">Post Table</a>
                </li>
            </ul>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="" class="form-label">Post Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title',$post->title)}}">
                            @error('title')
                            <span class="alert alert-danger">
                                <strong class="text-white">{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post Image</label>
                            <img src="{{asset('storage/product/'.$post->photo)}}" alt="" style="width: 45px; height: auto">
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            @error('photo')
                            <span class="alert alert-danger">
                                <strong class="text-white">{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post Tag</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{$category->id}}" {{old('category_id',$post->category_id )== $category->id ?'selected': ""}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post Title</label>
                            <textarea name="description" cols="10" rows="5" class="form-control @error('description') is-invalid @enderror">{{old('description',$post->description)}}</textarea>
                            @error('description')
                            <span class="alert alert-danger">
                                <strong class="text-white">{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center">
                            <input type="submit" class="btn btn-primary" value="Update Post">
                            <a href="{{route('post.index')}}" class="nav-link">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
