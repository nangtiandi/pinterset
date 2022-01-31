@extends('user.app')
@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-center mt-5 h-100">
                <div class="d-flex align-items-center align-self-center card-cookie p-3 text-center cookies">
                    <img src="https://image.shutterstock.com/image-vector/cookie-icon-vector-isolated-on-600w-1186259491.jpg" width="50">
                    <span class="mt-2">We use third party cookies to personalize content, ads and analyze site traffic.</span>
                    <a class="d-flex align-items-center" href="#">Learn more<i class="fa fa-angle-right ml-2"></i></a>
                    <button class="btn btn-dark mt-3 px-4" type="button">Okay</button>
                </div>
            </div>
        </div>
    </div>
@endsection
