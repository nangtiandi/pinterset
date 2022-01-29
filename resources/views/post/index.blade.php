@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Post Tag</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Owner</th>
                            <th>Post Manage</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Post Tag</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Owner</th>
                            <th>Post Manage</th>
                        </tr>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td><p class="badge bg-info text-white">{{$post->category->name}}</p></td>
                                <td>
                                    <img src="{{asset('storage/product/'.$post->photo)}}" alt="" style="width: 50px; height: auto;border-radius: 8px;">
                                </td>
                                <td>{{$post->excerpt}}</td>
                                <td><p class="small">
                                    @if(auth()->user()->role != 1)
                                        <p>**{{$post->user->name}} **</p>
                                        @else
                                        {{$post->user->name}}
                                        @endif
                                        </p></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{route('post.show',$post->id)}}">
                                            <i class="fas fa-eye text-info"></i>
                                        </a>
                                        <a href="{{route('post.edit',$post->id)}}" class="mx-3">
                                            <i class="fas fa-pen-alt text-warning"></i>
                                        </a>
                                        <form action="{{route('post.destroy',$post->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
