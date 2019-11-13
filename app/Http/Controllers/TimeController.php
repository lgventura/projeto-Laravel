<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use App\Jogadore;
use Carbon\Carbon;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportarTimes;
use App\Exports\ExportarDetalhes;


class TimeController extends Controller
{
  public function index(){

    $dados = Time::paginate(5);

    $view = [
      'times' => $dados,
    ];

    return view('adm/times/exibir', $view);

  }

  public function add(){

    return view('adm/times/inserir', $view);

  }

  public function dados($id){

    $dados = Time::find($id);

    $view = [
      'dados'        => $dados
    ];

    return view('adm/times/form', $view);

  }

  public function detalhes($id){

    $dados      =  Time::find($id);
    $jogadores  =  Jogadore::where('times_id', $id)->orderBy('nome')->get();
    
    $view = [
      'time'      =>  $dados,
      'jogadores'  =>  $jogadores
    ];

    return view('adm/times/detalhes', $view);

  }

  public function vincular($id){

    $dados      =  Time::find($id);
    $jogadores  =  Jogadore::where('times_id', 1)->orderBy('nome')->get();
    
    $view = [
      'dados' => $dados,
      'jogadores' => $jogadores
    ];

    return view('adm/times/vincular', $view);

  }

  public function jogadores(Request $request){
    $timeId = $request['id'];

    $jogadores = explode(",", $request['jogadores']);
    $jogadoresAux = Jogadore::orderBy('nome')->get();

    DB::beginTransaction();

    try {

      foreach ($jogadores as $j) {
        foreach ($jogadoresAux as $jAux) {
          if($j == $jAux->nome){
            $jogador = Jogadore::find($jAux->id);
            
            $jogador->times_id = $timeId;
            
            $jogador->update();
          }
        }
      }
      
      DB::commit();
      
      return redirect('adm/times')->with('certo', 'Jogadores Vinculados com sucesso');

    } catch (\Exception $e) {
      DB::rollback();
      return back()->with('erro', 'Erro ao vincular jogadores');
    }

  }


  public function deletar($id){

    if(Time::find($id)->delete()){
      return back()->with('certo', 'time excluido com sucesso');
    }else{
      return back()->with('erro', 'Erro ao excluir time');
    }

  }

  public function cadastrar(){
     return view('adm/times/form');

  }

  public function inserir(Request $request){
  
    $dados = $request->except('_token');

    DB::beginTransaction();

    try {
      
      $time = new Time($dados);
      
      $time->save();
      
      DB::commit();
     
      return redirect('/adm/times')->with('certo', 'Novo Time, cadastrado com sucesso');

    } catch (\Exception $e) {
      DB::rollback();

      return url('/adm/times');
      back()->with('erro', 'Erro ao cadastrar o time');
    }


  }



  public function editar(Request $request){

    $dados = $request->except('_token');
    
    DB::beginTransaction();

    try {
      $time = Time::find($dados['id']);

      $time->update($dados);

      DB::commit();
      return redirect('adm/times')->with('certo', 'Time editado com sucesso');

    } catch (\Exception $e) {
      DB::rollback();
      return back()->with('erro', 'Erro ao editar o TIme');
    }

  }

  public function exportExcel(){
    return Excel::download(new ExportarTimes, 'Times.xlsx');
  }

  public function exportDetalhesExcel($id){

    $dados =  Time::find($id);

    return Excel::download(new ExportarDetalhes($id), $dados->nome.'.xlsx');
  }


}
