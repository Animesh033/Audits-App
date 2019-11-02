<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/*
 * added by animesh
*/
use Validator;
use Illuminate\Support\Facades\Auth; 
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $states = State::all();
        return view('admin.cities.index',['cities'=> $cities,'states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('admin.cities.create',['states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $messages = [
                'cityName.required' => 'Please enter the city name!',
            ];

            $validator = Validator::make($request->all(), [
                'cityName' => 'required|unique:cities,name|max:255',
            ], $messages);

            if ($validator->fails()) {
                return redirect()->route('cities.create')
                            ->withErrors($validator)
                            ->withInput();
            }

            $city = City::create([
                'name' => $request->cityName,
                'state_id' => $request->cityState,
            ]);

            if($city){
                // return redirect()->route('cities.index')
                // ->with('success' , 'City created successfully');
                return response()->json([
                    'success' => true
                ]);
            }
        
        }
        // return back()->withInput()->with('errors', 'Error creating new city');
        return response()->json([
            'success' => false
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $city = City::find($city->id);
        $states = State::all();
        
        return view('admin.cities.edit', ['city'=>$city,'states' => $states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $cityUpdate = City::where('id', $city->id)
                                  ->update([
                                          'name'=> $request->input('cityName'),
                                          'state_id'=> $request->input('cityState'),
                                  ]);
        
        if($cityUpdate){
            // return redirect()->route('states.index')
            // ->with('success' , 'State updated successfully');
            return response()->json([
                'success' => true
            ]);
        }
        //redirect
        // return back()->withInput();
        return response()->json([
            'success' => false
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $findcity = City::find($city->id);
        if($findcity->delete()){
            
            //redirect
            // return redirect()->route('cities.index')
            // ->with('success' , 'City deleted successfully');
            return response()->json([
                                'success' => true
                            ]);
        }
        
        // return back()->withInput()->with('error' , 'City could not be deleted');
        return response()->json([
                            'success' => false
                        ]);
    }
}
