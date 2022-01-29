@extends('user.app')
@section('content')
    <div class="row my-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('post.upload')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Post Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                            @error('title')
                            <span class="alert alert-danger">
                                <strong class="text-white">{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post Image</label>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input @error('photo') is-invalid @enderror" id="customFile" value="{{old('photo')}}">
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
                                    <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected': ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Post Title</label>
                            <textarea name="description" cols="10" rows="5" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                            @error('description')
                            <span class="alert alert-danger">
                                <strong class="text-white">{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Upload Post">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
