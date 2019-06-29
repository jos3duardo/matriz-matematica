<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- style   --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    {{-- javascript   --}}
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/matriz.js')}}"></script>
    <script src="{{asset('js/fonts.js')}}"></script>
{{--    <script src="https://kit.fontawesome.com/59fcfbbe04.js"></script>--}}
    <title>Matriz</title>
</head>
<body>
    @component('Components.nav')
    @endcomponent
        {{-- mensagem para tratamento do retorno--}}
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <h4>{{ $error }}</h4>
                    </div>
                @endforeach
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-primary">
                <h4>{{ session('status') }}</h4>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <h4>{{ session('success') }}</h4>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                <h4>{{ session('error') }}</h4>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                @component('Components.sidebar')
                @endcomponent
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @yield('content')
                </main>
            </div>
        </div>
</body>
</html>
