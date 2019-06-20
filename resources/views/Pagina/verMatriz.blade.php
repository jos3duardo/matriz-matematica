@extends('Layout.principal')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-1">
            @component('Components.sidebar')
            @endcomponent
            </div>
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Matriz com  {{$matriz->linhas}} linhas  x {{$matriz->colunas}} Colunas </h4><br>
                    </div>
                    <div class="card-body" style="text-align: center">
                        @php
                            $teste=1;
                            $colunas = $matriz->colunas;
                        @endphp

                        @foreach($dadosJson as $key => $dado)
                            <input type="text" value="{{$dado}}">
                            <?php
                            //                            echo 'c'.$colunas;
                            //                            echo 'k'.($key+1);

                            ?>
                            @if($colunas == $teste )
                                <br/>
                                <?php
                                //                                echo 'ca'.$colunas;
                                $colunas+=$matriz->colunas;
                                //                                echo 'cn'.$colunas;
                                ?>
                            @endif
                            <?php $teste++?>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <a href="{{route('inversa',['id' => $matriz->id])}}" class="btn btn-success "><i class="fas fa-exchange-alt"></i> Inversa</a>
                        <a href="{{route('transposta',['id' => $matriz->id])}}" class="btn btn-warning "><i class="fas fa-retweet"></i> Transposta</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
