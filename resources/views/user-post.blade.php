@extends('user.app')
@section('content')
    <section class="bg-gray200 pt-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <article class="card">
                        <img src="{{asset('storage/product/'.$post->photo)}}" alt="" class="img-fluid img-thumbnail">
                        <div class="card-body">
                            <h1 class="card-title display-4">
                                {{$post->title}} </h1>
                            <div class="d-flex">
                                <p>Post by <strong>{{$post->user->name}}. </strong> </p>
                                <p> Created At <i>{{$post->created_at->diffForHumans()}}</i></p>
                            </div>
                            <h4 class="my-3">Type :  {{$post->category->name}}</h4>
                            <p>{{$post->description}}</p>
                            <!-- Begin Comments -replace demowebsite with your own id
                            ================================================== -->
                            @if(session('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif
                            <ul class="list-group ">
                                <li class="list-group-item active">
                                    <b>Comments {{count($post->comments)}}</b>
                                </li>
                                @foreach($post->comments as $comment)
                                    <li class="list-group-item">
                                        <a href="{{route('comment.delete',$comment->id)}}" class="{{auth()->user()->id != $comment->user_id ?? 'd-none'}}">
                                            <i class="fa fa-close"></i>
                                        </a>
                                        {{$comment->comment}}
                                        <div class="small mt-2">
                                            By <strong>{{$comment->user->name}}</strong>,
                                            comment at {{$comment->created_at->diffForHumans()}}
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            @auth
                                <div id="comments" class="mt-4">
                                    <div id="disqus_thread">
                                        <form action="{{url('comments/add')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                            @error('comment')
                                            <span class="alert alert-danger">
                                                <strong>{{$message}}</strong>
                                            </span>
                                            @enderror
                                            <textarea name="comment" class="form-control mb-2 @error('comment') is-invalid @enderror" placeholder="Write Review"></textarea>
                                            <button class="btn btn-primary">Send Review</button>
                                            <a href="{{route('/')}}" class="text-secondary mx-3">Cancel</a>
                                        </form>
                                    </div>
                                </div>
                            @endauth

                            <!--End Comments
                            ================================================== -->
                        </div>
                    </article>
                </div>
            </div>
        </div>
{{--        <div class="container-fluid mt-5">--}}
{{--            <div class="row">--}}
{{--                <h5 class="font-weight-bold">More like this</h5>--}}
{{--                <div class="card-columns">--}}
{{--                    @foreach($posts as $post)--}}
{{--                        <div class="card card-pin">--}}
{{--                            <img class="card-img" src="{{asset('storage/product/'.$post->photo)}}" alt="Card image" maxw>--}}
{{--                            <div class="overlay">--}}
{{--                                <h2 class="card-title title">{{$post->title}}</h2>--}}
{{--                                <div class="more">--}}
{{--                                    <a href="{{route('user.post',$post->id)}}">--}}
{{--                                        <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> More </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </section>
@endsection
