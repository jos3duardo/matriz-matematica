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
                        <h3>Matriz Inversa</h3>
                        <h4 class="card-title">Matriz com  {{$matriz->linhas}} linhas  x {{$matriz->colunas}} Colunas </h4><br>
                    </div>
                    <div class="card-body" style="text-align: center">
                        @php
                            $teste=1;
                            $colunas = $matriz->colunas;
                        @endphp

                        @foreach($inversa as $key => $dado)
                            <input type="text" value="{{$dado}}">
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
                    <div class="card-footer">
                        <a href="{{route('ver',['id' => $matriz->id])}}" class="btn btn-primary "><i class="fas fa-angle-left"></i> Volta</a>
                        <a href="{{route('transposta',['id' => $matriz->id])}}" class="btn btn-warning "><i class="fas fa-retweet"></i> Transposta</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
