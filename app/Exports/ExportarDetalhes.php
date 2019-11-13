<?php

namespace App\Exports;

use App\Time;
use App\Jogadore;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportarDetalhes implements FromCollection, WithHeadings
{
    use Exportable;
    
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection(){
        $jogadores  =  Jogadore::where('times_id', $this->id)->orderBy('nome')->get();


        foreach ($jogadores as $j) {
             $jogadoresAux[] = [
                'jogador'          => $j->nome,
                'numero da camisa' => $j->numero,
                'posicao'          => $j->posicoes->posicao,
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
            'Time',
        ];
    }

}