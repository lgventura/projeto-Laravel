<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jogadore;
use App\Posicoe;
use Carbon\Carbon;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportarJogadores;


class JogadoreController extends Controller
{
  public function index()
  {
    $dados = Jogadore::paginate(5);//paginar

    $cont = Jogadore::get()->count();


    $view = [
      'jogadores' => $dados,
      'cont' => $cont,
    ];

    return view('adm/jogadores/exibir', $view);

  }

  public function add(){

    $responsavel = Jogadore::orderBy('nome')->get();

    $view = [
      'responsavel'  => $responsavei,
    ];

    return view('adm/jogadores/inserir', $view);

  }

  public function dados($id){

    $dados = Jogadore::find($id);
    $posicoes = Posicoe::orderBy('id')->get();


    $view = [
      'dados'    => $dados,
      'posicoes' => $posicoes
    ];

    return view('adm/jogadores/form', $view);

  }


  public function deletar($id){

    if(Jogadore::find($id)->delete()){
      return back()->with('certo', 'Jogador excluido com sucesso');
    }else{
      return back()->with('erro', 'Erro ao excluir Jogador');
    }

  }

  public function desvincular($id){
    
    DB::beginTransaction();

    try {
      $jogador = Jogadore::find($id);
      $jogador->times_id = 1;

      $jogador->update();
      
      DB::commit();
      return redirect('adm/jogadores')->with('certo', 'Jogador, Desvinculado com sucesso');

    } catch (\Exception $e) {
      DB::rollback();
      
      return back()->with('erro', 'Erro ao desvincular o Jogador');
    }
  }

  public function cadastrar(){
    $posicoes = Posicoe::orderBy('id')->get();
    
    $view = [
      'posicoes' => $posicoes,
    ];

    return view('adm/jogadores/form', $view);

  }

  public function inserir(Request $request){
    
    $dados = $request->except('_token');
    
    DB::beginTransaction();

    try {
      
      $jogador = new Jogadore($dados);
      
      $jogador->save();
      
      DB::commit();
      return redirect('adm/jogadores')->with('certo', 'Novo Jogador, cadastrado com sucesso');

    } catch (\Exception $e) {
      DB::rollback();
      
      return back()->with('erro', 'Erro ao cadastrar o Jogador');
    }
    

  }

  public function editar(Request $request){

    $dados = $request->except('_token');
    
    DB::beginTransaction();

    try {
      $com = Jogadore::find($dados['id']);
      
      $com->update($dados);
      
      DB::commit();
      return redirect('adm/jogadores')->with('certo', 'Jogador editado com sucesso');

    } catch (\Exception $e) {
      DB::rollback();
      return back()->with('erro', 'Erro ao editar o Jogador');
    }

  }


  public function exportExcel(){
    return Excel::download(new ExportarJogadores, 'Jogadores.xlsx');
  }

}
