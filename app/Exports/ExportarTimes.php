<?php

namespace App\Exports;

use App\Time;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportarTimes implements FromCollection, WithHeadings
{
    use Exportable;
    
    public function collection(){
        $time  =  Time::all();


        foreach ($time as $t) {
            if($t->id != 1){
                $timeAux[] = [
                    'nome'       => $t->nome,
                    'abreviacao' => $t->abreviado,
                    'cidade'     => $t->cidade,
                    'uf'         => $t->uf,
                    'ano'        => $t->ano_fundacao,
                ];
            }
        }

        $timeColection = collect($timeAux);

        return $timeColection;
    }

    public function headings(): array
    {
        return [
            'Nome',
            'Abreviação',
            'Cidade',
            'UF',
            'Ano de Fundação',
        ];
    }

}