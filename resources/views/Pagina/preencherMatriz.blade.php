@extends('Layout.principal')
@section('content')
    <div class="align-items-center">
        <div class="card" style="text-align: center" >
            <div class="card-header">
                <h3>Preencher a Matriz <small>( {{$linha}} linhas X {{$coluna}} colunas)</small></h3>
            </div>
            <div class="card-body" >
                <form action="{{route('gravarMatriz',['linha'=>$linha, 'colunas' =>$coluna])}}" method="post">
                    @csrf
                    <div>
                        @for($i = 1; $i <= $linha;$i++)
                            @for($j = 1; $j <= $coluna;$j++)
                                <input type="text" class="inputMatrix" name="valores[]" id="col{{$j}}lin{{$i}}" required autofocus>
                            @endfor
                            <hr>
                        @endfor
                    </div>
                    <button type="submit" class="btn btn-success"  id="listaValores" >Gravar</button>
    {{--                    <a href="#" onclick="alert('Em desenvolvimento')" class="btn btn-warning" id="addLinha">+ linha</a>--}}
    {{--                    <a href="#" onclick="alert('Em desenvolvimento')" class="btn btn-danger" id="removeLinha">- linha</a>--}}
                </form>
            </div>
        </div>
    </div>
@endsection
