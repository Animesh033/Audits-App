<?php

namespace App\Http\Controllers\Admin;

use App\Models\Scheduler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/*
 * added by animesh
*/
use Validator;
use Illuminate\Support\Facades\Auth; 
use App\Models\Client;
use App\Models\State;
use App\Models\City;
use App\Models\Region;
use App\Mail\AuditScheduled;
use Mail;
class SchedulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Client::all()->unique('site');
        $schedules = Scheduler::all();
        return view('admin.scheduler.index', compact('sites','schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json([
        //                 'scheduleAudits' => $request->all(),
        //             ]);

        if(Auth::check()){
            // $messages = [
            //     'stateName.required' => 'Please enter the state name!',
            // ];

            // $validator = Validator::make($request->all(), [
            //     'stateName' => 'required|unique:states,name|max:255',
            // ], $messages);

            // if ($validator->fails()) {
            //     return redirect()->route('states.create')
            //                 ->withErrors($validator)
            //                 ->withInput();
            // }

            $scheduler = Scheduler::create([
                'site' => $request->siteName,
                'client_id' => $request->clientId,
                'state_id' => $request->stateId,
                'city_id' => $request->cityId,
                'region_id' => $request->regionId,
                'audit_date' => $request->auditDate,
                'month_year' => $request->monthYear,
            ]);

            if($scheduler){
                $client = Client::find($request->clientId);  
                // $count = 0;
                // print_r($client->email_id);
                // dd(explode("|",$client->email_id));
                $arr = [];
                foreach (array_unique(explode("|",$client->email_id)) as $email) {
                    array_push($arr, $email);
                    $when = now()->addMinutes(10);
                    Mail::to($email)->send(new AuditScheduled($scheduler));
                }
                // $user->notify(new CreateUserNotification($user));
                // return redirect()->route('states.index')
                // ->with('success' , 'State created successfully');
                return response()->json([
                    'success' => true,
                    // 'client_email' => $arr,
                ]);
            }
        
        }
        // return back()->withInput()->with('errors', 'Error creating new state');

        return response()->json([
            'success' => false
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function show(Scheduler $scheduler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function edit(Scheduler $scheduler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scheduler $scheduler)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scheduler  $scheduler
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scheduler $scheduler)
    {
        //
    }
    /** Custom Function */ 
        public function siteDetails(Request $request)
        {
            $siteName = $request->name;
            $client = Client::where('site',$siteName)->first();
            $state = State::find($client->state_id);
            $city = City::find($client->city_id);
            $region = Region::find($client->region_id);
            // $clientsState = $client->clients;
            // $states = [];
            // foreach ($clients as $client) {
            //     $state = $client->state;
            //     if (!in_array($state, $states))
            //     {
            //         array_push($states,$state);
            //     }
            // }
            return response()->json([
                            'client' => $client,
                            'state' => $state,
                            'city' => $city,
                            'region' => $region,
                        ]);
        }
    /** End Custom*/ 
    public function clientsState(Request $request)
    {
        $clientName = $request->name;
        $clients = Client::where('name',$clientName)->get();
        // $states = State::find($client->state_id);
        // $clientsState = $client->clients;
        $states = [];
        foreach ($clients as $client) {
            $state = $client->state;
            if (!in_array($state, $states))
            {
                array_push($states,$state);
            }
        }
        return response()->json([
                        'clientstate' => $states,
                    ]);
    }

    public function clientsCity(Request $request)
    {
        $clientName = $request->client_name;
        $stateId = $request->state_id;
        $clients = Client::where([
            ['name',$clientName],
            ['state_id',$stateId],
        ])->get();
        // $states = State::find($client->state_id);
        // $clientsState = $client->clients;
        $cities = [];
        foreach ($clients as $client) {
            $city = $client->city;
            if (!in_array($city, $cities))
            {
                array_push($cities,$city);
            }
        }
        return response()->json([
                        'clientcity' => $cities,
                    ]);
    }

    public function clientsRegion(Request $request)
    {
        $clientName = $request->client_name;
        $stateId = $request->state_id;
        $cityId = $request->city_id;
        $client = Client::where([
            ['name',$clientName],
            ['state_id',$stateId],
            ['city_id',$cityId],
        ])->first();

        $region = Region::find($client->region_id);
        // $states = State::find($client->state_id);
        // $clientsState = $client->clients;
        // $cities = [];
        // foreach ($clients as $client) {
        //     $city = $client->city;
        //     if (!in_array($city, $cities))
        //     {
        //         array_push($cities,$city);
        //     }
        // }
        return response()->json([
                        'clientregion' => $region,
                    ]);
    }
}
