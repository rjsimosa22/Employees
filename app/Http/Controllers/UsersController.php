<?php
 
namespace App\Http\Controllers;
 

use App\Users;
use App\Status;
use App\Privileges;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
 
class UsersController extends Controller
{

    public function index()
    {   
        $options='Users';
        $selects='UsersList';
        if(request()->ajax()) {
            return datatables()->of(Users::select('a.id','a.name','a.email','b.description as status','c.description')->from('users as a')->join('status_globals as b','a.status','=','b.id')->join('privileges as c','a.id_privileges','=','c.id')->orderBy('a.name', 'asc')->get())
            ->addColumn('action', 'action/user_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('user.index',['options'=>$options,'selects'=>$selects]);
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
        $Userid=$request->Userid;
        $Username=$request->Username;
        $Useruser=$request->Useruser;
        $Userstatus=$request->Userstatus;
        $Userprofile=$request->Userprofile;
        $Userpassword=Hash::make($request->Userpassword);

        $user   =   Users::updateOrCreate(
            ['id' => $Userid],
            [
                'name' => $Username, 
                'email' => $Useruser,
                'status' => $Userstatus,
                'password' => $Userpassword,
                'id_privileges' => $Userprofile,
            ]
        );        
        return Response::json($user);
    }
    
    public function edit($id)
    {   
        $where=array('id' => $id);
        $user=Users::where($where)->first();
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $privileges=Privileges::select('a.id','a.description')->from('privileges as a')->orderby('a.description')->get();
        return Response::json(['user'=>$user,'status'=>$status,'privileges'=>$privileges]);
    }
    
    public function destroy($id)
    {
        $user = Users::where('id',$id)->delete();
        return Response::json($user);
    }
}