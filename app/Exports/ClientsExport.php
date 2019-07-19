<?php

namespace App\Exports;

use App\Client;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ClientsExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function Collection()
    {   
        return Client::select('c.description as type','a.document','a.name','a.phone','a.email','a.contact','a.birthdate','a.anniversary','b.description as status','a.address','a.observations')->from('clients as a')->join('status_globals as b','a.status','=','b.id')->join('type_document as c','a.type','=','c.id')->orderBy('a.name', 'asc')->get();
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
            'TIPO DE DOCUMENTO    ',
            'NRO. DE DOCUMENTO     ',
            'NOMBRE Y APELLIDO   ',
            'TELEFONO     ',  
            'EMAIL     ',
            'CONTACTO     ',
            'FECHA DE NACIMIENTO     ',
            'FECHA DE ANIVERSARIO     ',
            'ESTATUS     ',
            'DIRECCION     ',
            'OBSERVACION     ',
        ];
    }
}
