@extends('Layout.principal')
@section('content')
    <hr>
        <a href="{{route('index')}}" class="btn btn-dark"> <i class="fas fa-chevron-left"></i> Voltar</a>
        <a class=" btn btn-warning" data-toggle="modal" data-target="#dadosMatrizModal">

            <i class="fas fa-info-circle"></i> Dados da Matriz
        </a>
    <hr>
    <div class="content">
        <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="card" style="text-align: center" >
                <div class="card-header">
                    <h4>Matriz - {{$matriz->linhas}} linhas  x {{$matriz->colunas}} Colunas </h4>
                </div>
                <form id="matriz">
                    <div id="tabela" class="card-body">
                        @php
                            $auxiliar=1;
                            $colunas = $matriz->colunas;
                        @endphp
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
                    </div>
                    <div class="card-footer">
                        <button onclick="Inversa('Inversa')" class="btn btn-sm btn-success"><i class="fas fa-exchange-alt"></i> Inversa</button>
                        <button onclick="Transposta('Transposta')" class="btn btn-sm btn-warning"><i class="fas fa-retweet"></i> Transposta</button>
                        <button id="teste" onclick="Transposta('Transposta2')" class="btn btn-sm btn-dark"><i class="far fa-hourglass"></i> é simétrica</button>
                        <button onclick="alert('Soma de matriz em desenvolvimento')" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Somar</button>
                        <button onclick="alert('Subtracao de matriz em desenvolvimento')" class="btn btn-sm btn-danger"><i class="fas fa-minus"></i> Subtrair</button>
                        <button id="multiplicar" type="submit" style="border-color: black" data-toggle="modal" data-target="#numeroMatrizModal" class="btn btn-sm"><i class="fas fa-times"></i> Multiplicar</button>
                        <button onclick="alert('Subtracao de matriz em desenvolvimento')" class="btn btn-sm btn-primary"><i class="fas fa-times"></i> Multiplicar Matriz</button>
                    </div>
                </form>
            </div>
        </div>
        {{--  operações das matrizes      --}}
        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center border-bottom">
            {{--inicio matriz inversa--}}
            <div id="Inversa" style="display: none">
                <div class="card"  style="text-align: center">
                    <div class="card-header"  style="background-color: #28a745;border-color:#28a745 ">
                        <h4 class="card-title">Matriz Inversa</h4>
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
            <div id="Transposta" style="display: none">
            <div class="card"  style="text-align: center">
                <div class="card-header" style="background-color: #ffc107;border-color: #ffc107">
                    <h4 class="card-title">Matriz Transposta</h4>
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
        </div>
            {{--fim matriz transposta--}}

            {{--inicio matriz multiplicada por um numero x--}}
            @if(isset($multiplicacao))

            <div id="Inversa" style="display: block">
                <div class="card"  style="text-align: center">
                    <div class="card-header">
                        <h4 class="card-title">Matriz X {{$numero}}</h4>
                    </div>
                    <div class="card-body">
                        @php
                            $auxiliar=1;
                            $colunas = $matriz->colunas;
                        @endphp
                        @foreach($multiplicacao as $key => $dado)
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
            @endif
            {{--fim matriz multiplicada por um numero x--}}
        </div>

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
                            <h5>Número de Linas - {{$matriz->linhas}}</h5>
                            <h5>Número de Colunas - {{$matriz->colunas}}</h5>
                            <h5>Tipo -{{($matriz->tipo ? $matriz->tipo : "Sem tipo definido") }}</h5>
                            <h5>Criada em - {{$matriz->created_at->format('d/m/Y H:i:s')}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
