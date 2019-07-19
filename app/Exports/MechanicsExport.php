<?php

namespace App\Exports;

use App\Mechanics;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MechanicsExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function Collection()
    {   
        return Mechanics::select('a.description','a.abreviation','c.description as commission','b.description as status')->from('mechanics  as a')->join('status_globals as b','a.status','=','b.id')->join('commission as c','a.id_commission','=','c.id')->orderBy('a.description', 'asc')->get();
    }

    public function registerEvents(): array
    {   
        $styleArray=[
            'font'=>array(
                'size'=>11,
                'bold'=>true,
                'name'=>'Calibri',
                'background-color'=>'#000000',
            )
        ];

        return [
            BeforeSheet::class=>function(BeforeSheet $event) use ($styleArray){
                $event->sheet->insertNewColumnBefore(7,2);
                $event->sheet->insertNewColumnBefore('A',2);
            },

            AfterSheet::class=>function(AfterSheet $event) use ($styleArray){
                $event->sheet->setAutoFilter('A1:D1');
                $event->sheet->getStyle('A1:D1')->applyFromArray($styleArray);
            }
        ];
    }

    public function headings(): array
    {   
        return [
            'NOMBRE    ',
            'ABREVIACION     ',
            'COMISION   ',
            'ESTATUS     ',  
        ];
    }
}
