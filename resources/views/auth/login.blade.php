@extends('index')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="card mx-auto w-50 p-4">
            <form action="{{ route('login.authenticate') }}" method="POST" class="mb-4">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <button type="submit" class="btn btn-app mt-2 w-100">Login</button>
            </form>
            <div class="text-center">
                <span>Not a member? </span>
                <span>
                    <a class="text-primary font-weight-bold" href="{{ route('register.create') }}">Register</a>
                </span>
            </div>
        </div>
    </div>
@endsection
