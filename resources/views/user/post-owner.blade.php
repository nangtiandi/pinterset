@extends('user.app')
@section('content')
    <section class="bg-gray200 pt-5 pb-5">
        <div class="container-fluid mt-5">
            <a href="{{route('post.upload')}}" class="btn btn-secondary my-3">Upload Post</a>
            <div class="row">
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="card-columns">
                    @foreach($posts as $post)
                        <div class="card card-pin">
                            <img class="card-img" src="{{asset('storage/product/'.$post->photo)}}" alt="Card image">
                            <div class="overlay">
                                <h2 class="card-title title">{{$post->title}}</h2>
                                <div class="more">
                                    <a href="{{route('user.post',$post->id)}}">
                                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
