@extends('Layout.principal')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="card border">
        <div class="card-header">
            <h4>Gerar matriz</h4>
        </div>
        <div class="card-body">
            <form action="{{route('gerarMatriz')}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="col">
                        <input type="number" class="form-control" name="colunas" placeholder="Número de Colunas" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="linhas" placeholder="Número de Linhas" required>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-warning">Gerar Matriz</button>
            </form>
        </div>
    </div>
</div>

    {{-- Matrizes geradas--}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"></div>
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
</div>    {{-- gerando uma matriz --}}

@endsection
