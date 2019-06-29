<?php

namespace App\Http\Controllers;

use App\dadosMatriz;
use App\Matriz;
use Illuminate\Http\Request;

class MatrizController extends Controller
{
    public function index(){
        $matrizes = Matriz::all();

    return view('Pagina.index', compact('matrizes'));
    }


    /** como o proprio nome sugere ele gera os campos para o usuario preencher a matriz
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gerarMatriz(Request $request){
        $linha = $request->input('linhas');
        $coluna = $request->input('colunas');
        return view('Pagina.preencherMatriz', compact('linha','coluna'));
    }
    public function gravarMatriz(Request $request, $linha, $coluna){
        $dados = json_encode($request->input('valores'));
        $matriz = new Matriz();
        $matriz->linhas = $linha;
        $matriz->colunas = $coluna;
        if ($matriz->save()){
            $dadosMatriz = new dadosMatriz();
            $dadosMatriz->matrizs_id = $matriz->id;
            $dadosMatriz->dados = $dados;
            $dadosMatriz->save();
        }
        return redirect(route('index'))->with('success','A matriz foi apagada com sucesso!');
    }
    public function Ver($id){
        $matriz = Matriz::find($id);
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();
        $dadosMatriz = $dados[0]->dados;
        $dadosJson = json_decode($dadosMatriz);
        $inversa = array();
        foreach ($dadosJson as $key => $dados){
            $inversa[$key] = ($dados * (-1));
        }
        return view('Matriz.Ver',compact('dadosJson','dados','matriz','inversa'));
    }
    public function Inversa($id){
        $matriz = Matriz::find($id);
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();

        $dadosMatriz = $dados[0]->dados;
        $dadosJson = json_decode($dadosMatriz);
        $inversa = array();
        foreach ($dadosJson as $key => $dados){
            $inversa[$key] = ($dados * (-1));
        }

//        dd($inversa);
//        return view('Matriz.Inversa',compact('dadosJson','dados','matriz','inversa'));
        return view('Matriz.ver',compact('dadosJson','dados','matriz','inversa'));
    }


    public function Transposta($id){

        $matriz = Matriz::find($id);
        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();

        $dadosMatriz = $dados[0]->dados;
        $dadosJson = json_decode($dadosMatriz);

        return view('Matriz.Transposta',compact('dadosJson','dados','matriz'));
    }

    public function destroy($id){
        $matriz = Matriz::find($id);

        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->first();

        $dados->delete();

        if($matriz->delete()){

            return redirect(route('index'))->with('success','A matriz e todos os seus dados foram apagada com sucesso!');
        }else{
            return redirect(route('index'))->with('success','A matriz não pode ser apagada!');
        }
    }

}
