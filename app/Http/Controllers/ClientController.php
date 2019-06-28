<?php
 
namespace App\Http\Controllers;
 
use App\Client;
use Illuminate\Http\Request;
use Redirect,Response;
 
class ClientController extends Controller
{
    public function index()
    {   
        $options='Client';
        $selects='ClientList';
        if(request()->ajax()) {
            return datatables()->of(Client::select('a.id','a.name','a.document','a.type as idtype','a.phone','c.description as type','b.description')->from('clients as a')->join('status_globals as b','a.status','=','b.id')->join('type_document as c','a.type','=','c.id')->orderBy('a.name', 'asc')->get())
            ->addColumn('action', 'action/client_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
       
        return view('client.index',['options'=>$options,'selects'=>$selects]);
    }

    public function search()
    { 
        if(request()->ajax()) {
            return datatables()->of(Client::select('a.id','a.name','a.document','a.type as idtype','a.phone','c.description as type','b.description')->from('clients as a')->join('status_globals as b','a.status','=','b.id')->join('type_document as c','a.type','=','c.id')->get())
            ->addColumn('action', 'action/clientSearch_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
       
        return view('client.search');
    }
    
    public function create()
    {   
        $options='Client';
        $selects='ClientRegister';
        return view('client.create',['options'=>$options,'selects'=>$selects]);
    }

    public function store(Request $request)
    {   
        $Clientid = $request->Clientid;
        $Clientname = $request->Clientname;
        $Clienttype = $request->Clienttype;
        $Clientemail = $request->Clientemail;
        $Clientphone = $request->Clientphone;
        $Clientstatus = $request->Clientstatus;
        $Clientcontact = $request->Clientcontact;
        $Clientaddress = $request->Clientaddress;
        $Clientdocument = $request->Clientdocument;
        $Clientbirthdate = $request->Clientbirthdate;
        $Clientanniversary = $request->Clientanniversary;
        $Clientobservations = $request->Clientobservations;
        
        $client = Client::updateOrCreate(
            ['id' => $Clientid],
            [
                'name' => $Clientname,
                'type' => $Clienttype,
                'email' => $Clientemail,
                'phone' => $Clientphone,
                'status' => $Clientstatus,
                'contact' => $Clientcontact,
                'address' => $Clientaddress,
                'profile' => 'Administrador',
                'document' => $Clientdocument,
                'birthdate' => $Clientbirthdate,
                'anniversary' => $Clientanniversary,
                'observations' => $Clientobservations
            ]
        ); 
        return Response::json($client);
    }
    
    public function edit($id)
    {   
        $where = array('id' => $id);
        $client =Client::select('a.id','a.name','a.document','a.type','a.address','a.phone','a.email','a.contact','a.birthdate','a.anniversary','a.observations','a.status','b.description')->from('clients as a')->join('status_globals as b','a.status','=','b.id')->join('type_document as c','a.type','=','c.id')->where('a.id',$id)->first();
        return Response::json($client);
    }
    
    public function destroy($id)
    {
        $client = Client::where('id',$id)->delete();
        return Response::json($client);
    }
}