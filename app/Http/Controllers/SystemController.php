<?php
 
namespace App\Http\Controllers;

use DB;
use App\System;
use App\Status;
use Illuminate\Http\Request;
use Redirect,Response;

class SystemController extends Controller
{
    
    public function index(Request $request)
    {   
        $bd=$request->bd;
        $options='system';
        $module=$request->module;
        $selects=$request->selects;
        if(request()->ajax()) {
            return datatables()->of(System::select('a.id','a.description','a.abreviation','a.date_edit as date','b.description as status')->from($bd.' as a')->join('status_globals as b','a.status','=','b.id')->get())
            ->addColumn('action', 'action/system_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('system.index',['bd'=>$bd,'module'=>$module,'module'=>$module,'options'=>$options,'selects'=>$selects]);
    }
    
    public function create()
    {   
        $options='Vehicle';
        $selects='VehRegister';
        $marks=Marks::select('a.id','a.description')->from('marks as a')->orderby('a.description')->get();
        $categories=Categories::select('a.id','a.description')->from('categories as a')->orderby('a.description')->get();
        return view('vehicles.create',['marks'=>$marks,'categories'=>$categories,'options'=>$options,'selects'=>$selects]);
    }

    public function store(Request $request)
    {  
        $bd=$request->bd;
        $btn=$request->btn;
        $Systemid=$request->Systemid;
        $Systemstatus=$request->Systemstatus;
        $Systemdescription=$request->Systemdescription;
        $Systemabreviation=$request->Systemabreviation;
        
        if($btn=='edit') {
            $vehicles=DB::update('update '.$bd.' set status='.$Systemstatus.',description="'.$Systemdescription.'",abreviation="'.$Systemabreviation.'" where id = ?', [$Systemid]);
        } else {
            $vehicles=DB::insert('insert into '.$bd.' (description,abreviation,profile_edit,status) values (?,?,?,?)', ["$Systemdescription","$Systemabreviation",'Administrador',$Systemstatus]);
        }
        return Response::json($vehicles);
    }
    
    public function edit(Request $request)
    {   
        $id=$request->id;
        $bd=$request->bd;
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $system=System::select('a.id','a.description','a.abreviation','a.date_edit as date','a.status')->from($bd.' as a')->orderby('a.description')->where('a.id','=',$id)->get();        
        return Response::json(['status'=>$status,'system'=>$system]);
    }
    
    public function destroy(Request $request)
    { 
        $id=$request->id;
        $bd=$request->bd;
        $system=System::from($bd)->where('id',$id)->delete();
        return Response::json($system);
    }

    public function models(Request $request)
    {   
        $id=$request->id;
        $models=Models::select('a.id','a.description')->from('models as a')->orderby('a.description')->where([['a.idmarks','=',$id],['a.status','=','1']])->get();
        return Response::json($models);
    }
}