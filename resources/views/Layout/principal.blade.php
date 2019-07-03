<!doctype html>
<html lang="pt_br">
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
    <div class="container-fluid">
        <div class="row">
            @component('Components.sidebar')
            @endcomponent
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                {{-- mensagem para tratamento do retorno--}}
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-dark">
                                <h4>{{ $error }}</h4>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-dark">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            &times;
                        </button>
                        <h4>{{ session('status') }}</h4>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-dark" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            &times;
                        </button>
                        <h4>{{ session('success') }}</h4>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-dark" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            &times;
                        </button>
                        <h4>{{ session('error') }}</h4>
                    </div>
                @endif
                    @yield('content')
            </main>
        </div>
    </div>
@component('Components.footer')
@endcomponent
</body>
</html>
