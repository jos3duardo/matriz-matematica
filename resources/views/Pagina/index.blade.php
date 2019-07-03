@extends('Layout.principal')
@section('content')
    <hr>
        <a class=" btn btn-warning" data-toggle="modal" data-target="#gerarMatrizModal">
            <i class="fas fa-folder-plus"></i> Criar Matriz
        </a>
    <hr>
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
    <!-- Modal pegando valor para multiplicar a matriz-->
    <div class="modal fade" id="gerarMatrizModal" tabindex="-1" role="dialog" aria-labelledby="gerarMatrizModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable"  role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h4>Gerar uma nova matriz</h4>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
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
                                <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> Gerar Matriz</button>
                                <button type="cancel" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-chevron-left"></i> Cancelar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--script especifico para esta pagina--}}
<script>
    //deixa o input selecionado na hora que o modal é aberto
    $('#gerarMatrizModal').on('shown.bs.modal', function () {
        $('#linha').focus();
    });
    //validando campo da linha e da coluna na hora de criar uma matriz
    //para não deixar criar uma matriz nula
    var formGeraMatriz = document.getElementById('formGeraMatriz');
    var coluna = document.getElementById('coluna');
    var linha = document.getElementById('linha');
    formGeraMatriz.addEventListener('submit', function (e) {
        // alerta o valor do campo
        // alert(coluna.value+linha.value)
        if (coluna.value <= 0 || linha.value <= 0) {
            // impede o envio do form
            e.preventDefault();
            alert('Os campos coluna e linha devem ser maior 0 !')
        }
    });
</script>
@endsection
