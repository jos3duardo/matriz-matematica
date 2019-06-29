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
                        <h3>Matriz Transposta</h3>


                    </div>
                    <div class="card-body" style="text-align: center">
                        <h5 class="card-title">Matriz   Original {{$matriz->linhas}} linhas  x {{$matriz->colunas}} Colunas </h5>
                        <div style="text-align: center">
                            @php
                                $teste2=1;
                                $colunas = $matriz->colunas;
                            @endphp

                            @foreach($dadosJson as $key => $dado)
                                <input type="text" value="{{$dado}}">
                                <?php
                                ?>
                                @if($colunas == $teste2 )
                                    <br/>
                                    <?php $colunas+=$matriz->colunas;?>
                                @endif
                                <?php $teste2++?>
                            @endforeach
                        </div>
                        <hr>
                        <h5 class="card-title">Matriz Transposta {{$matriz->colunas}} linhas  x {{$matriz->linhas}} Colunas </h5>
                        <div style="text-align: center">
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
                    <div class="card-footer">
                        <a href="{{route('ver',['id' => $matriz->id])}}" class="btn btn-primary "><i class="fas fa-angle-left"></i> Volta</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
