<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{route('index')}}" class=" nav-link btn btn-danger"><span class="fas fa-home"></span></a><br>
            </li>
            <li class="nav-item">
                <a type="button" class=" nav-link btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Itens Avaliados
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item"><a href="">1) (0,5 ponto) Indicar a matriz transposta (Mt) de uma matriz dada (M).</a></li>
                    <li class="list-group-item">2) (0,5 ponto) Indicar a matriz oposta (–M) de uma matriz dada (M).</li>
                    <li class="list-group-item">3) (1,0 ponto) Verificar se uma matriz é simétrica (M = Mt) ou assimétrica (Mt = –M).</li>
                    <li class="list-group-item">4) (1,0 ponto) Realizar a adição de duas matrizes, observadas as condições da operação.</li>
                    <li class="list-group-item">5) (1,0 ponto) Realizar a subtração de duas matrizes, observadas as condições da operação.</li>
                    <li class="list-group-item">6) (0,5 ponto) Realizar a multiplicação de uma matriz por uma constante (número real).</li>
                    <li class="list-group-item">7) (1,0 ponto) Realizar a multiplicação de duas matrizes, observadas as condições da operação.</li>
                    <li class="list-group-item">8) (0,5 ponto) Indicar o traço de uma matriz quadrada.</li>
                    <li class="list-group-item">9) (1,5 pontos) EXTRA!!! Indicar a matriz inversa (M-1) de uma matriz dada (M) de ordem 2.</li>
                    <li class="list-group-item">10) (1,0 ponto) Indicar o determinante de uma matriz de ordem 2.</li>
                    <li class="list-group-item">11) (1,0 ponto) Indicar o determinante de uma matriz de ordem 3.</li>
                    <li class="list-group-item">12) (1,0 ponto) Indicar a solução de um sistema linear de ordem 2.</li>
                    <li class="list-group-item">13) (1,0 ponto) Indicar a solução de um sistema linear de ordem 3.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
