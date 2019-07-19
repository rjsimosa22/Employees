<?php

namespace App\Exports;

use App\Vehicles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VehiclesExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function Collection()
    {   
        return Vehicles::select('c.name','a.plate','g.description as category','e.description as mark','f.description as model','a.colour','a.year','a.number_engine','a.number_series','d.description','a.observations')->from('vehicles as a')->join('clients__vehicles as b','a.id','=','b.id_vehicles')->join('clients as c','b.id_clients','=','c.id')->join('status_globals as d','a.status','=','d.id')->join('categories as g','a.category','=','g.id')->join('marks as e','a.mark','=','e.id')->join('models as f','a.model','=','f.id')->where('b.status','1')->get();
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
                $event->sheet->setAutoFilter('A1:K1');
                $event->sheet->getStyle('A1:K1')->applyFromArray($styleArray);
            }
        ];
    }

    public function headings(): array
    {   
        return [
            'PROPIETARIO   ',
            'PLACA    ',
            'CATEGORIA     ',
            'MARCA     ',  
            'MODELO     ',
            'COLOR     ',
            'AÑO     ',
            'NRO. DE MOTOR     ',
            'NRO. DE SERIE     ',
            'ESTATUS     ',
            'OBSERVACION     ',
        ];
    }
}
