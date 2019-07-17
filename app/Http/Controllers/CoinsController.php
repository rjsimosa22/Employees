<?php
 
namespace App\Http\Controllers;
 
use App\Coins;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
 
class CoinsController extends Controller
{

    public function index()
    {   
        $options='system';
        $selects='CoinsList';
        if(request()->ajax()) {
            return datatables()->of(Coins::select('a.id','a.description','a.abreviation','a.symbol','b.description as status')->from('coins as a')->join('status_globals as b','a.status','=','b.id')->orderBy('a.description', 'asc')->get())
            ->addColumn('action', 'action/coins_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('coins.index',['options'=>$options,'selects'=>$selects]);
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
        
        $Coinsid=$request->Coinsid;
        $Coinssymbol=$request->Coinssymbol;
        $Coinsstatus=$request->Coinsstatus;
        $Coinsdescription=$request->Coinsdescription;
        $Coinsabreviation=$request->Coinsabreviation;
       
        $coins   =   Coins::updateOrCreate(
            ['id' => $Coinsid],
            [
                'symbol'=> $Coinssymbol,
                'status'=> $Coinsstatus,
                'profile_edit'=> 'ADMINISTRADOR',
                'description' => $Coinsdescription, 
                'abreviation' => $Coinsabreviation
            ]
        );        
        return Response::json($coins);
    }
    
    public function edit($id)
    {   
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $coins=Coins::select('a.id','a.description','a.abreviation','a.symbol','a.status')->from('coins as a')->orderby('a.description')->where('a.id','=',$id)->get();        
        return Response::json(['coins'=>$coins,'status'=>$status]);
    }
  
    public function destroy($id)
    {
        $coins = Coins::where('id',$id)->delete();
        return Response::json($coins);
    }
}