<?php

namespace App\Exports;

use App\Jogadore;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportarJogadores implements FromCollection, WithHeadings
{
    use Exportable;
    
    public function collection(){
        $jogadores  =  Jogadore::all();

        foreach ($jogadores as $j) {
            $jogadoresAux[] = [
               'jogador'          => $j->nome,
               'numero da camisa' => $j->numero,
               'posicao'          => $j->posicoes->posicao,
               'pais'             => $j->pais,
               'time'             => $j->times->nome,
           ];
       }

       $jogadorColection = collect($jogadoresAux);

       return $jogadorColection;
    }

    public function headings(): array
    {
        return [
            'Jogador',
            'Numero da Camisa',
            'Posicao',
            'Pais',
            'Time',
        ];
    }

}