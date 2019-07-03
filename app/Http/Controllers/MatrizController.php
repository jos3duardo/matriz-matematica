<?php

namespace App\Http\Controllers;

use App\dadosMatriz;
use App\Matriz;
use Illuminate\Http\Request;
class MatrizController extends Controller
{
    public function index()
    {
        $matrizes = Matriz::all();
        return view('Pagina.index', compact('matrizes'));
    }
    /** como o proprio nome sugere ele gera os campos para o usuario preencher a matriz
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gerarMatriz(Request $request)
    {
        $linha = $request->input('linhas');
        $coluna = $request->input('colunas');
        
        return view('Matriz.preencher', compact('linha', 'coluna'));
    }
    //grava uma matriz e seus dados no bando de dados
    public function gravarMatriz(Request $request, $linha, $coluna)
    {
        $dados = json_encode($request->input('valores'));
        $matriz = new Matriz();
        $matriz->linhas = $linha;
        $matriz->colunas = $coluna;
        if ($linha == $coluna){
            $matriz->tipo = 'Quadrada';
        }
        else{
            $matriz->tipo = 'Sem tipo definido ';
        }
        if ($matriz->save()){
            $dadosMatriz = new dadosMatriz();
            $dadosMatriz->matrizs_id = $matriz->id;
            $dadosMatriz->dados = $dados;
            $dadosMatriz->save();
        }
        //verificado se a matriz é nula
        $nula = 0;
        $dadosMatriz = $dadosMatriz->dados;
        $dadosJson = json_decode($dadosMatriz);
        foreach ($dadosJson as $key => $dados){
            $nula += $dados * 1;
        }
        //valida os dados da matriz caso os valores sejam 0
        if ($nula == 0){
            $matriz = Matriz::find($matriz->id);
            $matriz->tipo .= ' Nula';
            $matriz->save();
        }
        return redirect(route('index'))->with('success','A matriz foi gerada com sucesso!');
    }
    //mostra os dados de uma matriz
    public function Ver($id){
        $matriz = Matriz::find($id);
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();
        $dadosMatriz = $dados[0]->dados;
        $dadosJson = json_decode($dadosMatriz);
        $oposta = array();
        foreach ($dadosJson as $key => $dados){
            $oposta[$key] = ($dados * (-1));
        }
        return view('Matriz.Ver',compact('dadosJson','dados','matriz','oposta'));
    }
    //função que realiza a multiplicação de uma matriz
    public function multiplicar(Request $request, $id){
        //numero pelo qual  a matriz sera multiplicado
        $numero = $request->numero;
        //procura a matriz com o id que é enviado
        $matriz = Matriz::find($id);
        //procura os dados da matriz
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();
        //pega somente os valores
        $dadosMatriz = $dados[0]->dados;
        $dadosJson = json_decode($dadosMatriz);
        $oposta = array();
        foreach ($dadosJson as $key => $dados){
            $oposta[$key] = ($dados * (-1));
        }
        $multiplicacao = array();
        foreach ($dadosJson as $key => $dados){
            $multiplicacao[$key] = ($dados * $numero);
        }
        return view('Matriz.Ver',compact('dadosJson','dados','matriz','oposta','multiplicacao','numero'));
    }
    //esta função não esta sendo utilizada
    //mas ela pode ser ativada a qualquer momento
    //ela faz a multiplicação da matriz por um numero que é informado dentro do formulario
    public function multiplicarForm(Request $request, $id){
        $numero = $request->numero;
        $matriz = Matriz::find($id);
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();
        //dados da matriz multiplicada
        $dadosNovos = $request->valor;
        //pega somente os numeros
        $dadosMatriz = $dados[0]->dados;
        //transforma em um array
        $dadosJson = json_decode($dadosMatriz);
        //calcula a $oposta para deixar ela disponivel na pagina
        $oposta = array();
        foreach ($dadosJson as $key => $dados){
            $oposta[$key] = ($dados * (-1));
        }
        //variavel que ira armazenar o resultado da multiplicação
        $multiplicacao = array();
        //realiza a multiplicação
        foreach ($dadosJson as $key => $dados){
            $multiplicacao[$key] = ($dados * $numero);
        }
        return view('Matriz.Ver',compact('dadosJson','dados','matriz','oposta','multiplicacao','numero'));
    }
    //por enquanto não esta sendo usada esta função os calculos estão sendo feitos direto na pagina
    public function Oposta($id){
        $matriz = Matriz::find($id);
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();
        $dadosMatriz = $dados[0]->dados;
        $dadosJson = json_decode($dadosMatriz);
        $oposta = array();
        foreach ($dadosJson as $key => $dados){
            $oposta[$key] = ($dados * (-1));
        }
        return view('Matriz.ver',compact('dadosJson','dados','matriz','oposta'));
    }
    //por enquanto não esta sendo usada esta função os calculos estão sendo feitos direto na pagina
    public function Transposta($id){
        $matriz = Matriz::find($id);
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();
        $dadosMatriz = $dados[0]->dados;
        $dadosJson = json_decode($dadosMatriz);
        return view('Matriz.Transposta',compact('dadosJson','dados','matriz'));
    }
    //função que realiza o calculo de uma matriz, usa como opcao enviada via request para retornar o valor apos os calculos
    public function calcularMatriz(Request $request, $id){
        //recebe a opcao enviada pelo request
        $opcao = $request->opcao;
        //recebe os dados que seram usados para fazer o calcula da matriz
        $dados2 = $request->dado2;
        //procura a matriz com o id que é enviado
        $matriz = Matriz::find($id);
        //procura os dados da matriz
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();
        //pega somente os numeros
        $dadosMatriz = $dados[0]->dados;
        //converte em um array
        $dadosJson = json_decode($dadosMatriz);

        //calcula a $oposta para deixar ela disponivel na pagina
        $oposta = array();
        foreach ($dadosJson as $key => $dados){
            $oposta[$key] = ($dados * (-1));
        }
        //variavel que ira guardar o resultado
        $resultado = array();
        //caso a opcao seja somar
        if ($opcao == 'somar'){
            foreach ($dadosJson as $key => $dados){
                $resultado[$key] = $dados + $dados2[$key];
            }
        }
        //caso a opcao sena subtrair
        if ($opcao == 'subtrair'){
            foreach ($dadosJson as $key => $dados){
                $resultado[$key] = $dados - $dados2[$key];
            }
        }
        return view('Matriz.Ver',compact('dadosJson','dados','matriz','oposta','multiplicacao','numero','resultado'));
    }
    //apaga uma matriz e todos os dados que existem nela
    public function destroy($id){
        $matriz = Matriz::find($id);
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->first();
        $dados->delete();
        if($matriz->delete()){
            return redirect(route('index'))->with('error','A matriz e todos os seus dados foram apagada com sucesso!');
        }else{
            return redirect(route('index'))->with('error','A matriz não pode ser apagada!');
        }
    }
    //edita uma matriz na view (Matriz.Ver)
    public function editar(Request $request, $id){
        $numeros = json_encode($request->input('numeros'));
        $matriz = Matriz::find($id);
        if ($matriz->save()){
            $dadosMatriz = dadosMatriz::find($matriz->id);
            $dadosMatriz->matrizs_id = $matriz->id;
            $dadosMatriz->dados = $ numeros;
            $dadosMatriz->save();
        }
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();
        $dadosMatriz = $dados[0]->dados;
        $dadosJson = json_decode($dadosMatriz);
        //calcula a $oposta para deixar ela disponivel na pagina
        $oposta = array();
        foreach ($dadosJson as $key => $dados){
            $oposta[$key] = ($dados * (-1));
        }

        return view('Matriz.Ver',['id' => $matriz->id], compact('dados','oposta','matriz',   'dadosJson'  ))->with('success','Matriz editada com sucesso!');
    }
    //calcula o traço de uma matriz quadrada
    public function traco($id,$colunaValor){
        //recebe o valor da coluna
        $coluna = $colunaValor;
        //procura a matriz com o id que é enviado
        $matriz = Matriz::find($id);
        //procura os dados da matriz
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();
        //pega somente os numeros
        $dadosMatriz = $dados[0]->dados;
        //converte em um array
        $dadosJson = json_decode($dadosMatriz);
        //calcula a $oposta para deixar ela disponivel na pagina
        $oposta = array();
        foreach ($dadosJson as $key => $dados){
            $oposta[$key] = ($dados * (-1));
        }
        //variavel que ira guardar o resultado
        $traco = 0;
        $key = 0;
        $traco += (int)$dadosJson[0];
        $tracoCalculo = (int)$coluna;
        foreach ($dadosJson as $dados) {
            if ($key == $tracoCalculo+1 ){
                $traco += (int)$dados;
                $key=0;
            }
            $key++;
        }
        return view('Matriz.Ver',compact('dadosJson','dados','matriz','oposta','traco'));
    }
}
