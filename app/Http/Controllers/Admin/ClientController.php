<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/*
 * added by animesh
*/
use Validator;
use Illuminate\Support\Facades\Auth; 
use App\Models\State;
use App\Models\City;
use App\Models\Client;
use App\Models\Region;
use DB;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $regions = Region::orderBy('name')->get();
        return view('admin.clients.index',compact('clients','states','cities','regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::select('id', 'name')->orderBy('name')->get();
        // $editors = DB::table('admins')
        //     ->join('admin_roles', 'admins.id', '=', 'admin_roles.admin_id')
        //     ->select('admins.id','admins.name','admins.email')
        //     ->get();
        $editors = DB::table('admins')
                ->join('admin_roles', function($join)
                {
                    $join->on('admins.id', '=', 'admin_roles.admin_id')
                         ->where('admin_roles.role_id', '=', 1);
                })
                ->select('admins.id','admins.name','admins.email')
                ->get();
                    // dd($editors);
        if(count($states)>0){
            if(State::find(1)){
                $cities = State::find(1)->cities()->select('id','name','state_id')->orderBy('name')->get();
            }
        }else{
            $cities = City::select('id','name','state_id')->orderBy('name')->get();
        }
        $regions = Region::select('id','name')->orderBy('name')->get()->unique('name'); //not required as i commented this field everywhere
        return view('admin.clients.create',compact('states','editors','cities','regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $str=$request->clients_email;  
        // $count = 0;
        // print_r($request->clients_email);
        // dd(explode("|",$str));
        if(Auth::check()){
            $messages = [
                'clientName.required' => 'Please enter the client name ',
                'siteName.required' => 'Please enter the site name ',

                'regionName.required' => 'Please enter the region name!',
                'stateName.required' => 'Please enter the state name!',
                'cityName.required' => 'Please enter the city name!',

                'attendanceCycle.required' => 'Please enter the attendance cycle ',
                'siteIncharge.required' => 'Please enter the site incharge ',
                'remarks.required' => 'Please enter the remarks ',
                // 'editor.required' => 'Please select the editor ',
                'clients_email.required' => 'Please enter the email address ',
            ];

            $validator = Validator::make($request->all(), [
                'clientName' => 'required',
                'siteName' => 'required|unique:clients,site',
                'regionName' => 'required',
                'stateName' => 'required',
                'cityName' => 'required',
                'attendanceCycle' => 'required',
                'siteIncharge' => 'required',
                'remarks' => 'required',
                // 'editor' => 'required',
                'clients_email' => 'required',
            ], $messages);

            if ($validator->fails()) {
                return redirect()->route('clients.create')
                            ->withErrors($validator)
                            ->withInput();
            }

            $client = Client::create([
                'name' => $request->clientName,
                'site' => $request->siteName,
                'state_id' => $request->stateName,
                'city_id' => $request->cityName,
                'region_id' => $request->regionName,
                // 'editor_id' => $request->editor,
                'email_id' => $request->clients_email,
                'attendance_cycle' => $request->attendanceCycle,
                'incharge' => $request->siteIncharge,
                'remarks' => $request->remarks,
            ]);

            if($client){
                return redirect()->route('clients.index')
                ->with('success' , 'Client created successfully');
            }
        
        }
        return back()->withInput()->with('errors', 'Error creating new Client');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        // dd($client);
        // $str=$client->email_id;  
        // dd(explode("|",$str));
        $states = State::orderBy('name')->get();

        // dd($states);
        $editors = DB::table('admins')
                ->join('admin_roles', function($join)
                {
                    $join->on('admins.id', '=', 'admin_roles.admin_id')
                         ->where('admin_roles.role_id', '=', 1);
                })
                ->select('admins.id','admins.name','admins.email')
                ->get();

        $cities = State::find($client->state_id)->cities()->orderBy('name')->get();
        $region = Region::find($client->region_id)->first();
        
        return view('admin.clients.edit',compact('client','cities','states','region','editors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
      $messages = [
          'clients_email.required' => 'Please enter the email address ',
      ];

      $validator = Validator::make($request->all(), [
          'clients_email' => 'required',
      ], $messages);

      if ($validator->fails()) {
          return redirect()->route('clients.edit',[$id])
                      ->withErrors($validator)
                      ->withInput();
      }
        $clientUpdate = Client::where('id', $id)
                                  ->update([
                                          'name' => $request->clientName,
                                          'site' => $request->siteName,
                                          'state_id' => $request->stateName,
                                          'city_id' => $request->cityName,
                                          'region_id' => $request->regionName,
                                          // 'editor_id' => $request->editor,
                                          'email_id' => $request->clients_email,
                                          'attendance_cycle' => $request->attendanceCycle,
                                          'incharge' => $request->siteIncharge,
                                          'remarks' => $request->remarks,
                                  ]);
        
        if($clientUpdate){
            return redirect()->route('clients.index')
            ->with('success' , 'Client updated successfully');
        }
        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findClient = Client::find($id);
        if($findClient->delete()){
            
            //redirect
            // return redirect()->route('clients.index')
            // ->with('error' , 'Client deleted successfully');
            return response()->json([
                'success' => true,
            ]);
        }
        
        // return back()->withInput()->with('error' , 'Client could not be deleted');
        return response()->json([
            'success' => false,
        ]);
    }
}
