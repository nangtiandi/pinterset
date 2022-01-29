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
                            <th>Category Name</th>
                            <th>Create At</th>
                            <th>Manage Buttons</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Create At</th>
                            <th>Manage Buttons</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <p class="m-0">
                                        <i class="fas fa-calendar text-muted"></i>
                                        {{$category->created_at->format('d / m / Y')}}
                                        ||
                                        <i class="fas fa-clock text-info"></i>
                                        {{$category->created_at->format('h:i:a')}}
                                    </p>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="{{route('category.edit',$category->id)}}" class="mx-3">
                                            <i class="fas fa-pen-alt text-warning"></i>
                                        </a>
                                        <form action="{{route('category.destroy',$category->id)}}" method="post">
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
