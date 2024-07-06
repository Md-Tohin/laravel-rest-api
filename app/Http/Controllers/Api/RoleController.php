<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    // index
    public function index(){
        $roles = DB::table('roles')->get();
        return response()->json([
            'success' => true,
            'message' => 'Role successfully retrieved!',
            'data' => $roles,
        ]);
    }

    //  store
    public function store(Request $request){
        $role = Role::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Role successfully created!',
            'data' => $role,
        ]);
    }

     // show
     public function show($id){
        $roles = Role::findOrFail($id);
        return response()->json([
            'success' => true,
            'message' => 'Role successfully retrieved!',
            'data' => $roles,
        ]);
    }

    // update
    public function update(Request $request, $id){
        $roles = Role::findOrFail($id)->update($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Role successfully updated!',
            'data' => [],
        ]);
    }

    // delete
    public function delete($id){
        Role::findOrFail($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Role successfully Deleted!',
            'data' => [],
        ]);
    }



}
