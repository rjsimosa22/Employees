<?php
 
namespace App\Http\Controllers;
 
use App\Client;
use Illuminate\Http\Request;
use Redirect,Response;
 
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Client::select('a.id','a.name','a.document','a.type as idtype','a.phone','c.description as type','b.description')->from('clients as a')->join('status_globals as b','a.status','=','b.id')->join('type_document as c','a.type','=','c.id')->get())
            ->addColumn('action', 'action/client_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
       
        return view('client.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {   
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                'document' => $Clientdocument,
                'birthdate' => $Clientbirthdate,
                'anniversary' => $Clientanniversary,
                'observations' => $Clientobservations
            ]
        ); 
        return Response::json($client);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $client =Client::select('a.id','a.name','a.document','a.type','a.address','a.phone','a.email','a.contact','a.birthdate','a.anniversary','a.observations','a.status','b.description')->from('clients as a')->join('status_globals as b','a.status','=','b.id')->join('type_document as c','a.type','=','c.id')->where('a.id',$id)->first();
        return Response::json($client);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::where('id',$id)->delete();
        return Response::json($client);
    }
}