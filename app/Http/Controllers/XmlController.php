<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use ZipArchive;

use Illuminate\Support\Facades\Response;
use App\Xml;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportarTime;
use App\Jobs\DownloadXml;
use Illuminate\Support\Facades\Storage;

class XmlController extends Controller
{
  public function index(){

    $dados = Xml::paginate(10);

    $view = [
      'xmls' => $dados,
    ];

    return view('adm/xmls/exibir', $view);

  }

  public function importar(){
     return view('adm/xmls/form');
  }

  public function inserir(Request $request){

    $dados = $request->except('_token', 'xml');
    
    $nameXml = null;
    
    if ($request->hasFile('xml') && $request->file('xml')->isValid()) {

      $name = uniqid(date('HisYmd'));

      $nameXml = "{$name}.xml";

      $uploadXml = $request->xml->storeAs('public/xml', $nameXml);
    }else{
      $uploadXml = "";
    }

    $remove = "public/";

    $uploadXml = str_replace($remove, "", $uploadXml);

    DB::beginTransaction();

    try {

      $xml = new Xml();

      $xml->caminho = "storage/".$uploadXml;
      $xml->nome = $nameXml;
      
      $xml->save();

      DB::commit();
      return redirect('adm/xmls')->with('certo', 'XML Importado com sucesso');

    } catch (\Exception $e) {
      DB::rollback();

      return back()->with('erro', 'Erro ao Importar XML');
    }


  }

  public function downloadxml($id){
    $xml = Xml::find($id);
    $file = public_path()."/storage/xml/".$xml->nome;

    $headers = array(
      'Content-Type: application/xml',
    );

    return Response::download($file, $xml->nome, $headers);
  }

  public function downloadSelectedXmls(Request $request){
    $ids = $request->get('download');
    
    $xmls = Xml::whereIn('id', $ids)->get();
    
    $public_dir=public_path();
    
    $zip_file = 'Xmls.zip';
    $zip = new ZipArchive;
    
    $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);    
      
      foreach ($xmls as $xml){

        $file = public_path()."/storage/xml/".$xml->nome;
        
        $zip->addFromString(basename($file),  file_get_contents($file));
        
      }

      $zip->close();
    
    $headers = array(
      'Content-Type' => 'application/octet-stream',
    );

    $filetopath=$public_dir.'/'.$zip_file;
    
    if(file_exists($filetopath)){
      return response()->download($filetopath,$zip_file,$headers);
    }
    
    return $ids;
    
  }

}
