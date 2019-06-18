@extends('Layout.principal')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card border">
                <div class="card-header">
                    <h4>Gerar matriz</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('gerarMatriz')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="">Linhas</label>
                                <input type="number" class="form-control" name="linhas" placeholder="Número de Linhas" required>
                            </div>
                            <div class="col">
                                <label for="">Colunas</label>
                                <input type="number" class="form-control" name="colunas" placeholder="Número de Colunas" required>
                            </div>

                        </div>
                        <hr>
                        <button type="submit" class="btn btn-warning">Gerar Matriz</button>
                    </form>
                </div>
            </div>
            @if(count($matrizes) > 0)
                <div class="card border">
                    <div class="card-header">
                        <h4>Matrizes Geradas</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-sm">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Coluna</td>
                                <td>Linha</td>
                                <td>Tipo</td>
                                <td>Opção</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($matrizes as $linha)
                                <tr>
                                    <th>{{$linha->id}}</th>
                                    <th>{{$linha->colunas}}</th>
                                    <th>{{$linha->linhas}}</th>
                                    <th>{{$linha->tipo}}</th>
                                    <th>
                                        <a href="{{route('ver', ['id' =>$linha->id])}}" class="btn btn-primary btn-sm">Ver</a>
                                        <a href="#" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{route('destroy', ['id' =>$linha->id])}}" class="btn btn-danger btn-sm">Apagar</a>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
