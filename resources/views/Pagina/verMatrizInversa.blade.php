@extends('Layout.principal')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-2">
                @component('Components.sidebar')
                @endcomponent
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Matriz com  {{$matriz->linhas}} linhas  x {{$matriz->colunas}} Colunas </h4><br>
                    </div>
                    <div class="card-body" style="text-align: center">
                        @foreach($inversa as $key => $dado)
                            <input type="text" value="{{$dado}}">
                            @if($matriz->colunas == $key+1)
                                <br/>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <a href="{{route('ver',['id' => $matriz->id])}}" class="btn btn-primary "><i class="fas fa-retweet"></i> Inversa</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
