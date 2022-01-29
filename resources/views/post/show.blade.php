@extends('layouts.master')
@section('content')
    <div class="row my-3 justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3>{{$post->title}}</h3>
                    <div class="d-flex">
                        <p>Post by <strong>{{$post->user->name}}.</strong></p> |
                        <p>Created At <i>{{$post->created_at->diffForHumans()}}</i></p>
                    </div>
                    <img src="{{asset('storage/product/'.$post->photo)}}" alt="" class="img-fluid img-thumbnail">
                    <h4 class="my-3">Post Item - {{$post->category->name}}</h4>
                    <p>{{$post->description}}</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('post.index')}}" class="btn btn-secondary">Back <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
