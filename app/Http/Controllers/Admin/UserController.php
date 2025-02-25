<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpadtedUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $user;
    protected $role;
    public function __construct(User $user, Role $role){
        $this->user = $user;
        $this->role = $role;
    }


    public function index(Request $request)
    {
        $users = $this->user->latest('id')->search($request->keyword)->paginate(5);

        return view('admin.users.index',compact('users'));
    }

//    public function search(Request $request){
//        $keyword = $request->input('keyword');
//        if(empty($keyword)){
//            return redirect()->route('users.index');
//        }
//        dd(User::where('name', 'like', '%' . $keyword . '%')->paginate(5));
//        return view('admin.users.index', compact('users'));
//    }


            public function search(Request $request){
                    $data = User::all();
                    if(isset($request->keyword) && !empty($request->keyword)){
                        $data = User::where('name', 'like', '%' . $request->keyword . '%')->get();
                    }

                    return view ('admin.users.index',compact('data'));
            }


    public function show(string $id)
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = $this->role->all()->groupBy('group');
        return  view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $dataCreate = $request->all();
        $dataCreate['password'] = Hash::make($dataCreate['password']);

        $user = $this->user->create($dataCreate);
        $user->roles()->attach($dataCreate['role_ids']);
        return to_route('users.index')->with(['message' => 'Successfully Created!']);
    }

    /**
     * Display the specified resource.


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->user->findOrFail($id)->load('roles');
        $roles = $this->role->all()->groupBy('group');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpadtedUserRequest $request, string $id)
    {

        $user = $this->user->findOrFail($id)->load('roles');

        $dataUpdate = $request->except(['password']);
        if($request->password){
            $dataUpdate['password'] = Hash::make($request->password);

        }
         $user->update($dataUpdate);
        $user->roles()->sync($dataUpdate['role_ids']);
        return to_route('users.index')->with(['message' => 'Successfully Upadte!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = $this->user->findOrFail($id); // Lấy user
        $user->roles()->detach(); // Nếu có quan hệ many-to-many với roles, cần xóa trước
        $user->delete(); // Xóa user

        return to_route('users.index')->with(['message' => 'Successfully Deleted!']); // Điều hướng sau khi xóa
    }


}
