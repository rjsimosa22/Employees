<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    public function Collection()
    {   
        return user::select('a.name','a.email','c.description','b.description as status')->from('users as a')->join('status_globals as b','a.status','=','b.id')->join('privileges as c','a.id_privileges','=','c.id')->orderBy('a.name', 'asc')->get();
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
                $event->sheet->getStyle('A1:G1')->applyFromArray($styleArray);
            }
        ];
    }

    public function headings(): array
    {   
        return [
            'NOMBRES Y APELLIDOS     ',
            'USUARIO     ',
            'PERFIL     ',  
            'ESTATUS     ',
        ];
    }
}
