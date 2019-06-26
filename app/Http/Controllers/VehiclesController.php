<?php
 
namespace App\Http\Controllers;

use App\Marks;
use App\Models;
use App\Vehicles;
use App\Categories;
use App\Clients_Vehicles;
use Illuminate\Http\Request;
use Redirect,Response;
 
class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Vehicles::select('a.id','a.plate','g.description as category','e.description as mark','f.description as model','a.year','d.description','c.name')->from('vehicles as a')->join('clients__vehicles as b','a.id','=','b.id_vehicles')->join('clients as c','b.id_clients','=','c.id')->join('status_globals as d','a.status','=','d.id')->join('categories as g','a.category','=','g.id')->join('marks as e','a.mark','=','e.id')->join('models as f','a.model','=','f.id')->where('b.status','1')->get())
            ->addColumn('action', 'action/vehicle_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('vehicles.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {   
        $marks = Marks::select('a.id','a.description')->from('marks as a')->orderby('a.description')->get();
        $models = Models::select('a.id','a.description')->from('models as a')->orderby('a.description')->get();
        $categories = Categories::select('a.id','a.description')->from('categories as a')->orderby('a.description')->get();
        return view('vehicles.create',['marks'=> $marks,'models'=> $models,'categories'=> $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $Vehid = $request->Vehid;
        $action = $request->action;
        $Vehyear = $request->Vehyear;
        $Vehmark = $request->Vehmark;
        $Vehmodel = $request->Vehmodel;
        $Vehmotor = $request->Vehmotor;
        $Vehserie = $request->Vehserie;
        $Vehplate = $request->Vehplate;
        $Clientid = $request->Clientid;
        $Vehcolour = $request->Vehcolour;
        $Vehstatus = $request->Vehstatus;
        $Vehcategory = $request->Vehcategory;
        $ClientidNew = $request->ClientidNew;
        $Vehobservations = $request->Vehobservations;
        
        $vehicles = Vehicles::updateorcreate(
            ['id' => $Vehid],
            [   
                'year' => $Vehyear,
                'mark' => $Vehmark,
                'model' => $Vehmodel,
                'plate' => $Vehplate,
                'status' => $Vehstatus,
                'colour' => $Vehcolour,
                'category' => $Vehcategory,
                'number_engine' => $Vehmotor,
                'number_series' => $Vehserie,
                'observations' => $Vehobservations
            ]
        ); 
        
        if($Vehid) { $Vehid=$Vehid; }  else { $Vehid=$vehicles->id;}          
        
        if($action=='register') {
            
            $clients_vehicles = Clients_Vehicles::create(['id_vehicles' => $Vehid,'id_clients' => $Clientid]);
            return Response::json(['clients_vehicles'=> $clients_vehicles]);
        
        } else {

            if($ClientidNew) {
                if($Clientid!=$ClientidNew) {
                    // Modifico en la tabla de intermedia clients_vehicles para inactivar el status
                    $clients_vehicles = Clients_Vehicles::where([['id_clients','=',$Clientid],['id_vehicles','=', $Vehid]])->update(['status' => '0']);
                    $clients_vehicles = Clients_Vehicles::create(['id_vehicles' => $Vehid,'id_clients' => $ClientidNew]);
                    return Response::json(['clients_vehicles'=> $clients_vehicles]);
                } else {
                    return Response::json( $vehicles);
                } 
            } else {
                return Response::json($vehicles);
            }
        }
        return Response::json($vehicles);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $status=1;
        $where = array('id' => $id);
        $marks = Marks::select('a.id','a.description')->from('marks as a')->orderby('a.description')->get();
        $models = Models::select('a.id','a.description')->from('models as a')->orderby('a.description')->get();
        $categories = Categories::select('a.id','a.description')->from('categories as a')->orderby('a.description')->get();
        $vehicles  = Vehicles::select('a.id','a.plate','a.category','a.mark','a.model','a.colour','a.year','a.number_engine','a.number_series','a.observations','a.status','c.id as Clientid','c.name','c.type','c.document','d.description')->from('vehicles as a')->join('clients__vehicles as b','a.id','=','b.id_vehicles')->join('clients as c','b.id_clients','=','c.id')->join('status_globals as d','a.status','=','d.id')->where([['a.id','=',$id],['b.status','=',$status]])->first();
        return Response::json(['vehicles'=> $vehicles,'marks'=> $marks,'models'=> $models,'categories'=> $categories]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Vehicles = Vehicles::where('id',$id)->delete();
        return Response::json($Vehicles);
    }
}