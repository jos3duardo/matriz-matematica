@extends('Layout.principal')
@section('content')
    <hr>
        <a href="{{route('index')}}" class="btn btn-dark"> <i class="fas fa-chevron-left"></i> Voltar</a>
        <a class=" btn btn-warning" data-toggle="modal" data-target="#dadosMatrizModal" title="Mostar dados da Matriz">
            <i class="fas fa-info-circle"></i> Dados da Matriz
        </a>
        <a onclick="mostrarDiv('matriz2')" id="btnAddMatriz" class="btn btn-success" title="Somar, Subtrair ou Multiplicar uma Matriz">
            <i class="fas fa-plus"></i> Soma - Sub - Mult
        </a>
    <hr>
    <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="card" style="text-align: center" >
            <div class="card-header">
                <h4>Matriz - {{$matriz->linhas}} linhas  x {{$matriz->colunas}} Colunas </h4>
            </div>
            <div class="card-body">
                @php
                    $auxiliar=1;
                    $colunas = $matriz->colunas;
                @endphp
                <div class="row justify-content-center">
                    <div class="col-md-auto" id="matriz1" style="display: block">
                        <div class="card">
                            <div class="card-header">
                                <h4>Matriz 1</h4>
                            </div>
                            <div class="card-body">
                                <form action="">
                                @foreach($dadosJson as $key => $dado)
                                    <input  type="text" class="inputMatriz" id="dado" value="{{$dado}}">
                                    @if($colunas == $auxiliar )
                                        <br/>
                                        <?php   $colunas+=$matriz->colunas;?>
                                    @endif
                                    <?php
                                    $auxiliar++;
                                    ?>
                                @endforeach
                                <br>
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Editar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-auto" id="matriz2" style="display: none">
                        <div class="card">
                            <div class="card-header alert-success">
                                <h4>Matriz 2</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('calcularMatriz',['id' => $matriz->id])}}" id="formCalculaMatriz" method="post">
                                    @csrf
                                    @foreach($dadosJson as $key => $dado)
                                        <input  type="text" class="inputMatriz"  name="dado2[]" id="dado" required autofocus>
                                        @if($colunas == $auxiliar )
                                            <br/>
                                            <?php   $colunas+=$matriz->colunas;?>
                                        @endif
                                        <?php
                                        $auxiliar++;
                                        ?>
                                    @endforeach
                                    <br>
                                    <button type="submit" name="opcao" value="somar" class="btn btn-sm btn-info" title="Somar a matriz"><i class="fas fa-plus"></i></button>
                                    <button type="submit" name="opcao" value="subtrair"  class="btn btn-sm btn-danger" title="Subtrair a matriz"><i class="fas fa-minus"></i> </button>
                                    <button type="submit" name="opcao" value="multiplicar"  class="btn btn-sm btn-dark" title="Multiplicar a matriz"><i class="fas fa-times"></i> </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if(isset($resultado))
                    <div class="col-md-auto" id="resultadoSoma" style="display: block">
                        <div class="card">
                            <div class="card-header alert-success">
                                <h4>Resultado Soma</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('calcularMatriz',['id' => $matriz->id])}}" id="formCalculaMatriz" method="post">
                                    @csrf
                                    @foreach($resultado as $key => $dado)
                                        <input  type="text" class="inputMatriz"  name="dado2[]" id="dado" value="{{$dado}}">
                                        @if($colunas == $auxiliar )
                                            <br/>
                                            <?php   $colunas+=$matriz->colunas;?>
                                        @endif
                                        <?php
                                        $auxiliar++;
                                        ?>
                                    @endforeach
                                    <br>
                                    <button type="submit" name="opcao" value="somar" class="btn btn-sm btn-info" title="Somar a matriz"><i class="fas fa-plus"></i></button>
                                    <button type="submit" name="opcao" value="subtrair"  class="btn btn-sm btn-danger" title="Subtrair a matriz"><i class="fas fa-minus"></i> </button>
                                    <button type="submit" name="opcao" value="multiplicar"  class="btn btn-sm btn-dark" title="Multiplicar a matriz"><i class="fas fa-times"></i> </button></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-footer">
                <a onclick="mostrarDiv('Inversa')" class="btn btn-sm btn-success"><i class="fas fa-exchange-alt"></i> Inversa</a>
                <a onclick="mostrarDiv('transposta')" class="btn btn-sm btn-warning"><i class="fas fa-retweet"></i> Transposta</a>
                @if($matriz->tipo == 'Quadrada Nula' || $matriz->tipo == 'Quadrada')
                    <a class="btn btn-sm btn-primary"><i class="far fa-hourglass"></i> simetria</a>
                @endif
                <a style="border-color: black" data-toggle="modal" data-target="#numeroMatrizModal" class="btn btn-sm"><i class="fas fa-times"></i> Multiplicar</a>
            </div>
        </div>
    </div>
    {{--  operações das matrizes      --}}
    <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center border-bottom">
        <div class="row justify-content-center">
            {{--inicio matriz inversa--}}
            <div class="col-md-auto" id="Inversa" style="display: none">
                <div class="card"  style="text-align: center">
                    <div class="card-header"  style="background-color: #28a745;border-color:#28a745 ">
                        <h4 class="card-title">Inversa</h4>
                    </div>
                    <div class="card-body alert-success">
                        @php
                            $auxiliar=1;
                            $colunas = $matriz->colunas;
                        @endphp
                        @foreach($inversa as $key => $dado)
                            <input type="text" class="inputMatriz" value="{{$dado}}"">
                            @if($colunas == $auxiliar )
                                <br/>
                                <?php
                                $colunas+=$matriz->colunas;
                                ?>
                            @endif
                            <?php $auxiliar++?>
                        @endforeach
                    </div>
                </div>
            </div>
            {{--fim matriz inversa--}}
            {{--inicio matriz transposta--}}
            <div class="card" id="transposta" style="display: none">
                <div class="card-header" style="background-color: #ffc107;border-color: #ffc107">
                    <h4 class="card-title">Transposta</h4>
                </div>
                <div class="card-body alert-warning"  >
                    @php
                        $auxiliar=1;
                        $colunas = $matriz->linhas;
                    @endphp
                    @foreach($dadosJson as $key => $dado)
                        <input type="text" class="inputMatriz" value="{{$dado}}">
                        @if($colunas == $auxiliar )
                            <br/>
                            <?php
                                $colunas+=$matriz->linhas;
                            ?>
                        @endif
                        <?php $auxiliar++?>
                    @endforeach
                </div>
            </div>
            {{--fim matriz transposta--}}
            {{--inicio do addMatriz --}}
            <div class="col-md-auto" id="addMatriz" style="display: none">
                    <div class="card-body alert-warning"  >
                        @php
                            $auxiliar=1;
                            $colunas = $matriz->linhas;
                        @endphp
                        @foreach($dadosJson as $key => $dado)
                            <input type="text" class="inputMatriz" name="">
                            @if($colunas == $auxiliar )
                                <br/>
                                <?php
                                $colunas+=$matriz->linhas;
                                ?>
                            @endif
                            <?php $auxiliar++?>
                        @endforeach
                    </div>
                </div>
            {{--fim  do addMatriz --}}
            {{--inicio matriz multiplicada por um numero x--}}
            @if(isset($multiplicacao))
                <div class="col-md-auto" id="addMatriz" style="display: block">
                <div class="card"  style="text-align: center">
                    <div class="card-header">
                        <h4 class="card-title">Multplicada x {{$numero}} </h4>
                    </div>
                    <div class="card-body">
                        @php
                            $auxiliar=1;
                            $colunas = $matriz->colunas;
                        @endphp
                        <form action="{{route('multiplicar',['id'=> $matriz->id])}}" method="post" id="multplicarMatriz">
                            @csrf
    {{--                        <label for="numero">Multiplicar por :</label>--}}
    {{--                        <input type="text" value="{{$numero}}" name="numero" class="form-group inputMatriz"><br>--}}
                            @foreach($multiplicacao as $key => $dado)
                                <input type="text" class="inputMatriz" name="valor[]" value="{{$dado}}">
                                @if($colunas == $auxiliar )
                                    <br/>
                                    <?php
                                    $colunas+=$matriz->colunas;
                                    ?>
                                @endif
                                <?php $auxiliar++?>
                            @endforeach
    {{--                            <input type="text" name="numero">--}}
                            <button type="submit" hidden></button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            {{--fim matriz multiplicada por um numero x--}}
        </div>
    </div>
    <div>
    <!-- Modal pegando valor para multiplicar a matriz-->
    <div class="modal fade" id="numeroMatrizModal" tabindex="-1" role="dialog" aria-labelledby="numeroMatrizModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable"  role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Informe um número para multiplicar a Matriz</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('multiplicar',['id'=> $matriz->id])}}" method="post" id="multplicarMatriz">
                        @csrf
                        <label for="numero">Número</label>
                        <input type="text" name="numero" id="numero" >
                        <button type="submit"  id="enviar" class="btn btn-dark btn-sm">Multiplicar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal infos da matriz-->
    <div class="modal fade" id="dadosMatrizModal" tabindex="-1" role="dialog" aria-labelledby="dadosMatrizModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Dados da Matriz</h2>
                    </div>
                    <div class="modal-body">
                        <div class="list-group-vertical-sm">
                            <h5>Número de Linhas - {{$matriz->linhas}}</h5>
                            <h5>Número de Colunas - {{$matriz->colunas}}</h5>
                            <h5>Tipo - {{($matriz->tipo ? $matriz->tipo : "Sem tipo definido") }}</h5>
                            <h5>Criada em - {{$matriz->created_at->format('d/m/Y H:i:s')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
@endsection
