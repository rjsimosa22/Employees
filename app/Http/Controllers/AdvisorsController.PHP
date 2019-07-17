<?php
 
namespace App\Http\Controllers;
 
use App\Status;
use App\Advisors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
 
class AdvisorsController extends Controller
{

    public function index()
    {   
        $options='system';
        $selects='AdvisorsList';
        if(request()->ajax()) {
            return datatables()->of(Advisors::select('a.id','a.description','a.abreviation','a.mobile','b.description as status')->from('advisors_service as a')->join('status_globals as b','a.status','=','b.id')->orderBy('a.description', 'asc')->get())
            ->addColumn('action', 'action/advisors_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('advisors.index',['options'=>$options,'selects'=>$selects]);
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
        
        $Advisorsid=$request->Advisorsid;
        $Advisorsmobile=$request->Advisorsmobile;
        $Advisorsstatus=$request->Advisorsstatus;
        $Advisorsdescription=$request->Advisorsdescription;
        $Advisorsabreviation=$request->Advisorsabreviation;
     
        $advisors   =   Advisors::updateOrCreate(
            ['id' => $Advisorsid],
            [
                'mobile'=> $Advisorsmobile,
                'status'=> $Advisorsstatus,
                'profile_edit'=> 'ADMINISTRADOR',
                'description' => $Advisorsdescription, 
                'abreviation' => $Advisorsabreviation
            ]
        );        
        return Response::json($advisors);
    }
    
    public function edit($id)
    {   
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $advisors=Advisors::select('a.id','a.description','a.abreviation','a.mobile','a.status')->from('advisors_service as a')->orderby('a.description')->where('a.id','=',$id)->get();        
        return Response::json(['advisors'=>$advisors,'status'=>$status]);
    }
    
    public function destroy($id)
    {
        $advisors = Advisors::where('id',$id)->delete();
        return Response::json($advisors);
    }
}