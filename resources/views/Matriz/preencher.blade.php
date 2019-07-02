@extends('Layout.principal')
@section('content')
    <hr>
    <a href="{{route('index')}}" class="btn btn-dark"><i class="fas fa-chevron-left"></i> Voltar</a>
    <a href="#" onclick="alert('Em desenvolvimento')" class="btn btn-warning disabled" id="addLinha" >+ linha</a>
    <a href="#" onclick="alert('Em desenvolvimento')" class="btn btn-danger disabled" id="removeLinha">- linha</a>
    <hr>
        <div class="card justify-content-center" style="text-align: center">
            <div class="card-header">
                <h3>Preencher a Matriz <small>( {{$linha}} linhas X {{$coluna}} colunas)</small></h3>
            </div>
            <div class="card-body">
                <form action="{{route('gravarMatriz',['linha'=>$linha, 'colunas' =>$coluna])}}" method="post">
                    @csrf
                        @for($i = 1; $i <= $linha;$i++)
                            @for($j = 1; $j <= $coluna;$j++)
                                <input type="text" name="valores[]" class="inputMatriz" id="col{{$j}}lin{{$i}}" required autofocus>
                            @endfor
                            <br>
                        @endfor
                    <br>
                    <button type="submit" class="btn btn-success"  id="listaValores">Gravar</button>
                </form>
            </div>
        </div>
@endsection
