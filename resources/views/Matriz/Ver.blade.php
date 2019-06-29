@extends('Layout.principal')
@section('content')
    <div class="content">
        <div class="align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div class="card" style="text-align: center" >
                <div class="card-header">
                    <h4>Matriz - {{$matriz->linhas}} linhas  x {{$matriz->colunas}} Colunas </h4>
                </div>
                <div id="tabela" class="card-body">
                    @php
                        $auxiliar=1;

                        $colunas = $matriz->colunas;
                    @endphp
                    @foreach($dadosJson as $key => $dado)
                        <input  type="text" class="inputMatriz" value="{{$dado}}">
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
                    <button onclick="alert('Subtracao de matriz em desenvolvimento')" class="btn btn-sm btn-default" style="border-color: black"><i class="fas fa-times"></i> Multiplicar</button>
                    <button onclick="alert('Subtracao de matriz em desenvolvimento')" class="btn btn-sm btn-primary"><i class="fas fa-times"></i> Multiplicar Matriz</button>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center flex-wrap flex-md-nowrap align-items-center border-bottom">
            {{--inicio matriz inversa--}}
            <div id="Inversa" style="display: none">
                <div class="card"  style="text-align: center">
                    <div class="card-header">
                        <h4 class="card-title">Matriz Inversa</h4>
                    </div>
                    <div class="card-body">
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
                <div class="card-header">
                    <h4 class="card-title">Matriz Transposta</h4>
                </div>
                <div class="card-body">
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
                    {{--fim matriz transposta--}}
                    <script>
                        function Inversa(el) {
                            var display = document.getElementById(el).style.display;
                            if(display == "block")
                                document.getElementById(el).style.display = 'none';
                            else
                                document.getElementById(el).style.display = 'block';
                        }
                        function Transposta(el) {
                            var display = document.getElementById(el).style.display;
                            if(display == "block")
                                document.getElementById(el).style.display = 'none';
                            else
                                document.getElementById(el).style.display = 'block';
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
