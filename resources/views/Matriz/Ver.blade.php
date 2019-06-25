@extends('Layout.principal')
@section('content')

    <div class="row">
        <div class="col-md-1">
            @component('Components.sidebar')
            @endcomponent
        </div>
        <div class="col-md-11">
            <div class="card" style="text-align: center" >
                <div class="card-header">
                    <h3>Matriz</h3>
                    <h4 class="card-title">{{$matriz->linhas}} linhas  x {{$matriz->colunas}} Colunas </h4><br>
                </div>
                <div class="card-body">
                    @php
                        $teste=1;
                        $colunas = $matriz->colunas;
                    @endphp

                    @foreach($dadosJson as $key => $dado)
                        <?= $key?><input type="text" value="{{$dado}}">
                        @if($colunas == $teste )
                            <br/>
                            <?php $colunas+=$matriz->colunas; ?>
                        @endif
                        <?php
                            $teste++
                        ?>

                    @endforeach


                </div>
                <br><br>
                <hr>
                <div class="card-footer">
{{--                        <a href="{{route('inversa',['id' => $matriz->id])}}" class="btn btn-success "><i class="fas fa-exchange-alt"></i> Inversa</a>--}}
                    <button type="button" onclick="Inversa('Inversa')" class="btn btn-success"><i class="fas fa-exchange-alt"></i> Inversa</button>
                    <button type="button" onclick="Transposta('Transposta')" class="btn btn-warning"><i class="fas fa-retweet"></i> Transposta</button>
{{--                        <a href="{{route('transposta',['id' => $matriz->id])}}" class="btn btn-warning "><i class="fas fa-retweet"></i> Transposta</a>--}}
                </div>
                {{--inicio matriz inversa--}}
                <div id="Inversa" style="display: none">
                    <br>
                    <div class="card"  style="text-align: center">
                        <div class="card-header">
                            <h4 class="card-title">Matriz Inversa</h4>
                        </div>
                        <div class="card-body">
                            @php
                                $teste=1;
                                $colunas = $matriz->colunas;
                            @endphp

                            @foreach($inversa as $key => $dado5)
                                <input type="text" value="{{$dado5}}">
                                <?php
                                ?>
                                @if($colunas == $teste )
                                    <br/>
                                    <?php
                                    $colunas+=$matriz->colunas;
                                    ?>
                                @endif
                                <?php $teste++?>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--fim matriz inversa--}}
                {{--inicio matriz transposta--}}
                <div id="Transposta" style="display: none">
                    <br>
                    <div class="card"  style="text-align: center">
                        <div class="card-header">
                            <h4 class="card-title">Matriz Transposta</h4>
                            <h5 class="card-title">{{$matriz->colunas}} linhas  x {{$matriz->linhas}} Colunas </h5>
                        </div>
                        <div class="card-body">
                            @php
                                $teste=1;
                                $colunas = $matriz->linhas;
                            @endphp
                            @foreach($dadosJson as $key => $dado)
                                <input type="text" value="{{$dado}}">
                                @if($colunas == $teste )
                                    <br/>
                                    <?php
                                    $colunas+=$matriz->linhas;
                                    ?>
                                @endif
                                <?php $teste++?>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{--fim matriz transposta--}}
            </div>
        </div>
    </div>
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
@endsection
