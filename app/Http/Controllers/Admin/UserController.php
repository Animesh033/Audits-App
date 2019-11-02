<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/*
 * added by animesh
*/
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Admin\Admin;
use App\Models\Admin\AdminRole;
use App\Notifications\Admin\CreateUserNotification;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::select('id','name')->orderBy('id')->get();
        $users = Admin::select('id','name', 'email')->orderBy('id')->get();
        return view('admin.users.index',compact('users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
        //     'success' => true,
        // ]);

        // $this->validator($request->all())->validate();

        $user = $this->createAdminUser($request->all());

        if($user){
            $this->registered($user);
            return response()->json([
                'success' => true,
            ]);
        }

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
        //
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
        $userUpdate = Admin::where('id', $id)
                                  ->update([
                                          'name'=> $request->input('name'),
                                          'email' => $request->input('email'),
                                          'password' => Hash::make($request->input('password')),
                                          // 'role_id' => $request->input('roleName'),
                                  ]);
        $updateRole = AdminRole::where('admin_id', $id)
        ->update([
            'role_id' => $request->input('role_id'), 
            'admin_id' => $id,
        ]);
        
        if($userUpdate){
            // return redirect()->route('users.index')
            // ->with('success' , 'User updated successfully');
            return response()->json([
                'success' => true,
            ]);
        }
        //redirect
        // return back()->withInput();
        return response()->json([
            'success' => false,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findUser = Admin::find($id);
        
        if($findUser->id != 1){
            $deleteAdminRole = AdminRole::where('admin_id', $id)->delete();
            if ($deleteAdminRole) {
              $findUser->delete();  
                //redirect
                // return redirect()->route('users.index')
                // ->with('success' , 'User deleted successfully');
              return response()->json([
                  'success' => true,
              ]);
            }
        }
        
        // return back()->withInput()->with('error' , 'Super Admin can not be deleted');
        return response()->json([
            'success' => false,
        ]);
    }

    protected function createAdminUser(array $data)
    {
        

        $admin =  Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        session(['createdUserPassword' => $data['password']]);
        $assignRole = AdminRole::create([
            'role_id' => $data['role_id'], 
            'admin_id' => $admin->id,
        ]);

        return $admin;
    }

    protected function registered($user) {
        $user->notify(new CreateUserNotification($user));
    }
}
