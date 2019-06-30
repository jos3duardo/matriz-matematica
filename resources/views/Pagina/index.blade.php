@extends('Layout.principal')
@section('content')
<div>
    <div class="card">
        <div class="card-header">
            <h4>Gerar matriz</h4>
        </div>
        <div class="card-body">
            <form action="{{route('gerarMatriz')}}" method="post" id="formGeraMatriz">
                @csrf
                <div class="form-row">

                    <div class="col">
                        <input type="number" class="form-control" id="linha" name="linhas" placeholder="Número de Linhas" required autofocus>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" id="coluna" name="colunas" placeholder="Número de Colunas" required>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-warning">Gerar Matriz</button>
            </form>
        </div>
    </div>
</div>

    {{-- Matrizes geradas--}}
<div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Matrizes Geradas</h4>
        </div>
        <div class="card-body">
            @if(count($matrizes) > 0 )
                <table class="table table-hover table-sm">
                    <thead>
                    <tr>
                        <td>Id</td>
                        <td>Linha</td>
                        <td>Coluna</td>
                        <td>Tipo</td>
                        <td>Data</td>
                        <td>Ações</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($matrizes as $matriz)
                        <tr>
                            <td>{{$matriz->id}}</td>
                            <td>{{$matriz->linhas}}</td>
                            <td>{{$matriz->colunas}}</td>
                            <td>{{($matriz->tipo ? $matriz->tipo : "Sem tipo definido") }}</td>
                            <td>{{$matriz->created_at->format('d/m/Y h:i:s')}}</td>
                            <td>
                                <a href="{{route('ver', ['id' => $matriz->id])}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{route('destroy',['id' => $matriz->id])}}" onclick="return confirm('Deseja excluir esta matriz')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3>ainda não existe nenhuma matriz no sistema</h3>
            @endif
        </div>
    </div>
</div>

<script>
        //validando campo da linha e da coluna na hora de criar uma matriz
        //para não deixar criar uma matriz nula
        var formGeraMatriz = document.getElementById('formGeraMatriz');
        var coluna = document.getElementById('coluna');
        var linha = document.getElementById('linha');
        formGeraMatriz.addEventListener('submit', function (e) {
            // alerta o valor do campo
            if (coluna >= 0 || linha >= 0) {
                alert('Os campos coluna e linha tem que ser maior 0')
            }
            // impede o envio do form
            e.preventDefault();
        });
    //fim da validação do campo da linha e da coluna
</script>
@endsection
