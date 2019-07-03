<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{route('index')}}" class=" nav-link">
                    <i class="fas fa-home"></i>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-bars"></i> Itens Avaliados
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="text-center">Itens Avaliados</h4>
            </div>
            <div class="modal-body">
                <div class="list-group-vertical-sm">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">01) (0,5) Indicar a matriz transposta (Mt) de uma matriz dada (M).</li>
                            <li class="list-group-item">02) (0,5) Indicar a matriz oposta (–M) de uma matriz dada (M).</li>
                            <li class="list-group-item">03) (1,0) Verificar se uma matriz é simétrica (M = Mt) ou assimétrica (Mt = –M).</li>
                            <li class="list-group-item">04) (1,0) Realizar a adição de duas matrizes, observadas as condições da operação.</li>
                            <li class="list-group-item">05) (1,0) Realizar a subtração de duas matrizes, observadas as condições da operação.</li>
                            <li class="list-group-item">06) (0,5) Realizar a multiplicação de uma matriz por uma constante (número real).</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">07) (1,0)  Realizar a multiplicação de duas matrizes, observadas as condições da operação.</li>
                            <li class="list-group-item">08) (0,5)  Indicar o traço de uma matriz quadrada.</li>
                            <li class="list-group-item">09) (1,5) EXTRA!!! Indicar a matriz inversa (M-1) de uma matriz dada (M) de ordem 2.</li>
                            <li class="list-group-item">10) (1,0)  Indicar o determinante de uma matriz de ordem 2.</li>
                            <li class="list-group-item">11) (1,0)  Indicar o determinante de uma matriz de ordem 3.</li>
                            <li class="list-group-item">12) (1,0)  Indicar a solução de um sistema linear de ordem 2.</li>
                            <li class="list-group-item">13) (1,0)  Indicar a solução de um sistema linear de ordem 3.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
