<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>VSES</title>
    <link rel="stylesheet" type= "text/css" href="../css/app.css">
    @stack('js')
    @stack('css')
    <script src="https://code.jquery.com/jquery-3.6.0.js" 
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});
    </script>
</head>
<body>
    @include('components.header')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center bg-custom">
            <div class="col-md-8 p-5">
                @if (isset($datas))
                    <div class="row">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    @foreach ($datas[0] as $col)
                                        @switch($col)
                                            @case("ID")
                                                <th scope="col">ID</th>
                                                @break
                                            @case("ClassName")
                                                <th scope="col">Loại phương tiện</th>
                                                @break
                                            @case("Speed")
                                                <th scope="col">Tốc độ</th>
                                                @break
                                            @default
                                                <th scope="col">Thời gian xuất hiện</th>
                                                @break
                                        @endswitch
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
                @if (isset($images))
                    <div class="row border border-app mt-5">
                        @foreach ($images as $img)
                            <div class="col-sm-6 p-4 text-center img-show">
                                <img src="{{$img}}">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
    @include('components.back')
</body>
</html>

