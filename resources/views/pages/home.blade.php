@extends('index')
@section('content')
    <div class="container-fluid mt-5">
        @include('components.error')
        <div class="row justify-content-center">
            <div class="col-md-6 mt-2 pr-4">
                @include('components.form_excute')
            </div>
        </div>
    </div>
@endsection
