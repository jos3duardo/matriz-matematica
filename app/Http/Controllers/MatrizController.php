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

    /**
     * direciona para uma view com a matriz
     */
    public function ver($id){
        $matriz = Matriz::find($id);
        $linha = $matriz->linhas;
        $coluna = $matriz->colunas;

        $dados = dadosMatriz::where([
            'matrizs_id' => $matriz->id
        ])->get();

        dd($dados);
        if (isset($dados)){
            return view('Pagina.preencherMatriz', compact('linha','coluna','matriz','dados'));
        }
        return view('Pagina.preencherMatriz', compact('linha','coluna','matriz'));
    }
    public function destroy($id){
        $matriz = Matriz::find($id);

        if($matriz->delete()){
            return redirect(route('index'))->with('success','A matriz foi apagada com sucesso!');
        }else{
            return redirect(route('index'))->with('success','A matriz não pode ser apagada!');
        }



    }

//    public function gravarMatriz(Request $request, $id){
    public function gravarMatriz(Request $request){

dd($request);
        $dado = $request->input('valores');
        $json = json_encode($dado);

        $matriz = Matriz::find($id);

        foreach ($dado as $key => $dados){
            $dados = new dadosMatriz();
            $dados->matrizs_id = $matriz->id;
            $dados->dados = $dado[$key];
            $dados->save();
        }

        return redirect(route('ver',['id' => $matriz->id]))->with('success','A matriz foi apagada com sucesso!');
    }
}
