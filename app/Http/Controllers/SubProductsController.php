<?php
 
namespace App\Http\Controllers;
 
use App\Status;
use App\Products;
use App\SubProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
 
class SubProductsController extends Controller
{

    public function index()
    {   
        $options='system';
        $selects='SublinesList';
        if(request()->ajax()) {
            return datatables()->of(SubProducts::select('a.id','c.description as products','a.description','a.abreviation','b.description as status')->from('sublines_product as a')->join('status_globals as b','a.status','=','b.id')->join('lines_product as c','a.id_product','=','c.id')->orderBy('c.description', 'asc')->get())
            ->addColumn('action', 'action/subproduct_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return view('subproduct.index',['options'=>$options,'selects'=>$selects]);
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
        $SubProductid=$request->SubProductid;
        $SubProductstatus=$request->SubProductstatus;
        $SubProductidproduct=$request->SubProductidproduct;
        $SubProductdescription=$request->SubProductdescription;
        $SubProductabreviation=$request->SubProductabreviation;
     
        $subproducts=SubProducts::updateOrCreate(
            ['id' => $SubProductid],
            [
                'status'=> $SubProductstatus,
                'profile_edit'=> 'ADMINISTRADOR',
                'id_product'=> $SubProductidproduct,
                'description' => $SubProductdescription, 
                'abreviation' => $SubProductabreviation
            ]
        );        
        return Response::json($subproducts);
    }
    
    public function edit($id)
    {   
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $products=Products::select('a.id','a.description')->from('lines_product as a')->orderby('a.description')->get();
        $subproducts=SubProducts::select('a.id','a.id_product','a.description','a.abreviation','a.status')->from('sublines_product as a')->orderby('a.description')->where('a.id','=',$id)->get();        
        return Response::json(['subproducts'=>$subproducts,'products'=>$products,'status'=>$status]);
    }
    
    public function add()
    {   
        $status=Status::select('a.id','a.description')->from('status_globals as a')->orderby('a.description')->get();
        $products=Products::select('a.id','a.description')->from('lines_product as a')->orderby('a.description')->get();
        return Response::json(['products'=>$products,'status'=>$status]);
    }
    
    public function destroy($id)
    {
        $subproducts = SubProducts::where('id',$id)->delete();
        return Response::json($subproducts);
    }
}