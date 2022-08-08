@extends('index')

@section('content')
<div class="container-fluid mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        @if (Route::currentRouteName() === 'excute')
            <div class="col-md-9 p-5">
                <div class="row mb-5">
                    <a class="btn btn-app ml-auto text-light" href="">export csv</a>
                </div>
                @if (isset($datas))
                    <div class="row">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    @foreach ($datas[0] as $col)
                                        <th scope="col">{{ $col }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 1; $i < count($datas); $i++)
                                    <tr>
                                        <th scope="row">{{ $datas[$i][0] }}</th>
                                        @for ($j = 1; $j < count($datas[$i]); $j++)
                                            <td>{{ $datas[$i][$j] }}</td>
                                        @endfor
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="row border border-app">
                    <div class="container">
                        <div class="row">
                            {{-- @if (isset($images))
                                @foreach ($images as $img)
                                    <div class="col-sm-3 p-4">
                                        <img class="img-thumbnail h-5" src="{{ $img }}" alt="Image Result">
                                        <p>abcxyz</p>
                                    </div>
                                @endforeach
                            @endif --}}
                            <div class="col-sm-3 p-4">
                                <img class="img-thumbnail h-5" src="{{ asset('storage/images/1.jpg') }}" alt="Image Result">
                                <p>abcxyz</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
