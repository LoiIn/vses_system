@extends('index')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="card mx-auto w-50 p-4">
            <form action="{{ route('register.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="form-group">
                    <label for="fullname">Fullname</label>
                    <input type="text" name="name" class="form-control" id="fullname" aria-describedby="emailHelp"
                        placeholder="abc...">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-app mt-2 w-100">Register</button>
            </form>
            <div class="text-center">
                <span>Have an account? </span>
                <span>
                    <a class="text-primary font-weight-bold" href="{{ route('login') }}">Login</a>
                </span>
            </div>
        </div>
    </div>
@endsection
