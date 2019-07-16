<?php
 
namespace App\Http\Controllers;
 
use App\Items;
use App\Coins;
use App\Status;
use App\Types_Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
 
class ItemsController extends Controller
{

    public function index()
    {  
     
        $options='system';
        $selects='ItemList';
        if(request()->ajax()) {
            return datatables()->of(Items::select('a.id','a.items','a.description','a.abreviation','a.symbol','a.price','a.status')->from('vw_items  as a')->orderBy('a.items', 'asc')->get())
            ->addColumn('action', 'action/items_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('item.index',['options'=>$options,'selects'=>$selects]);
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
        $Itemsid=$request->Itemsid;
        $Itemsprice=$request->Itemsprice;
        $Itemsstatus=$request->Itemsstatus;
        $Itemsidcoins=$request->Itemsidcoins;
        $Itemsidrubro=$request->Itemsidrubro;
        $Itemsdescription=$request->Itemsdescription;
        $Itemsabreviation=$request->Itemsabreviation;
     
        $items=Items::updateOrCreate(
            ['id' => $Itemsid], 
            [   
                'price'=> $Itemsprice,
                'status'=> $Itemsstatus,
                'id_coins'=> $Itemsidcoins,
                'hour'=> date('m:s:i'),
                'id_types_items'=> $Itemsidrubro,
                'profile_edit'=> 'ADMINISTRADOR',
                'description' => $Itemsdescription, 
                'abreviation' => $Itemsabreviation
            ]
        );        
        return Response::json($items);
    }
    
    public function edit($id)
    {   
        $coins=Coins::select('a.id','a.symbol')->from('coins as a')->orderby('a.description')->get();
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $types_items=Types_Items::select('a.id','a.description')->from('types_items as a')->orderby('a.description')->get();        
        $items=Items::select('a.id','a.description','a.abreviation','a.id_coins','a.id_types_items','a.price','a.id_status as status')->from('vw_items as a')->orderby('a.description')->where('a.id','=',$id)->get();        
        return Response::json(['items'=>$items,'types_items'=>$types_items,'coins'=>$coins,'status'=>$status]);
    }
    
    public function add()
    {   
        $coins=Coins::select('a.id','a.symbol')->from('coins as a')->orderby('a.description')->get();
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $types_items=Types_Items::select('a.id','a.description')->from('types_items as a')->orderby('a.description')->get();        
        return Response::json(['types_items'=>$types_items,'coins'=>$coins,'status'=>$status]);
    }
    
    public function destroy($id)
    {
        $items = Items::where('id',$id)->delete();
        return Response::json($items);
    }
}