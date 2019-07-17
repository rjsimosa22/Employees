<?php
 
namespace App\Http\Controllers;
 
use App\Status;
use App\TypeMovement;
use App\MovementsCash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
 
class MovementsCashController extends Controller
{

    public function index()
    {  
        $options='system';
        $selects='MovementsCashList';
        if(request()->ajax()) {
            return datatables()->of(MovementsCash::select('a.id','a.description','a.abreviation','c.description as type','b.description as status')->from('movements_cash  as a')->join('status_globals as b','a.status','=','b.id')->join('type_movement as c','a.id_type_movement','=','c.id')->orderBy('a.description', 'asc')->get())
            ->addColumn('action', 'action/movementscash_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('movementscash.index',['options'=>$options,'selects'=>$selects]);
    }
    
    public function store(Request $request)
    {   
        $MovementsCashid=$request->MovementsCashid;
        $MovementsCashtype=$request->MovementsCashtype;
        $MovementsCashstatus=$request->MovementsCashstatus;
        $MovementsCashdescription=$request->MovementsCashdescription;
        $MovementsCashabreviation=$request->MovementsCashabreviation;

        $MovementsCash=MovementsCash::updateOrCreate(
            ['id' => $MovementsCashid], 
            [   
                'status'=> $MovementsCashstatus,
                'profile_edit'=> 'ADMINISTRADOR',
                'id_type_movement'=> $MovementsCashtype,
                'abreviation' => $MovementsCashabreviation,
                'description' => $MovementsCashdescription
            ]
        );      
        return Response::json($MovementsCash);
    }
    
    public function edit($id)
    {   
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $TypeMovement=TypeMovement::select('a.id','a.description')->from('type_movement as a')->orderby('a.description')->get();
        $MovementsCash=MovementsCash::select('a.id','a.description','a.abreviation','a.id_type_movement','a.status')->from('movements_cash as a')->orderby('a.description')->where('a.id','=',$id)->get();        
        return Response::json(['MovementsCash'=>$MovementsCash,'TypeMovement'=>$TypeMovement,'status'=>$status]);
    }
    
    public function destroy($id)
    {
        $MovementsCash = MovementsCash::where('id',$id)->delete();
        return Response::json($MovementsCash);
    }
}