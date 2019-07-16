<?php
 
namespace App\Http\Controllers;
 
use App\Status;
use App\Mechanics;
use APP\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
 
class MechanicsController extends Controller
{

    public function index()
    {  
     
        $options='system';
        $selects='MechanicsList';
        if(request()->ajax()) {
            return datatables()->of(Mechanics::select('a.id','a.description','a.abreviation','c.description as commission','b.description as status')->from('mechanics  as a')->join('status_globals as b','a.status','=','b.id')->join('commission as c','a.id_commission','=','c.id')->orderBy('a.description', 'asc')->get())
            ->addColumn('action', 'action/mechanics_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('mechanics.index',['options'=>$options,'selects'=>$selects]);
    }

    public function create()
    {   
        $options='Users';
        $selects='UsersRegister';
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $privileges=Privileges::select('a.id','a.description')->from('privileges as a')->orderby('a.description')->get();
        return view('user.create',['status'=>$status,'privileges'=>$privileges,'options'=>$options,'selects'=>$selects]);
    }
    
    public function store(Request $request)
    {   
        $Mechanicsid=$request->Mechanicsid;
        $Mechanicsstatus=$request->Mechanicsstatus;
        $Mechanicsdescription=$request->Mechanicsdescription;
        $Mechanicsabreviation=$request->Mechanicsabreviation;
        $Mechanicsidcommission=$request->Mechanicsidcommission;

        $mechanics=Mechanics::updateOrCreate(
            ['id' => $Mechanicsid], 
            [   
                'status'=> $Mechanicsstatus,
                'profile_edit'=> 'ADMINISTRADOR',
                'abreviation' => $Mechanicsabreviation,
                'description' => $Mechanicsdescription, 
                'id_commission'=> $Mechanicsidcommission
            ]
        ); 
             
        return Response::json($mechanics);
    }
    
    public function edit($id)
    {   
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $commission=Mechanics::select('a.id','a.description')->from('commission as a')->orderby('a.description')->get();
        $mechanics=Mechanics::select('a.id','a.description','a.abreviation','a.id_commission','a.status')->from('mechanics as a')->orderby('a.description')->where('a.id','=',$id)->get();        
        return Response::json(['mechanics'=>$mechanics,'commission'=>$commission,'status'=>$status]);
    }
    
    public function add()
    {   
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $commission=Mechanics::select('a.id','a.description')->from('commission as a')->orderby('a.description')->get();
       return Response::json(['commission'=>$commission,'status'=>$status]);
    }
    
    public function destroy($id)
    {
        $mechanics = Mechanics::where('id',$id)->delete();
        return Response::json($mechanics);
    }
}