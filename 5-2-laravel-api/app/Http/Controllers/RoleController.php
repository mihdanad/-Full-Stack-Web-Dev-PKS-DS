<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table roles
        $roles = Role::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Role',
            'data'    => $roles  
        ], 200);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find role by ID
        $role = Role::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Role',
            'data'    => $role 
        ], 200);

    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $role = Role::create([
            'name'     => $request->title,
        ]);

        //success save to database
        if($role) {

            return response()->json([
                'success' => true,
                'message' => 'Role Created',
                'data'    => $role  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Role Failed to Save',
        ], 409);

    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $role
     * @return void
     */
    public function update(Request $request, ROle $role)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find role by ID
        $role = Role::findOrFail($role->id);

        if($role) {

            //update role
            $role->update([
                'name'     => $request->title,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Role Updated',
                'data'    => $role  
            ], 200);

        }

        //data role not found
        return response()->json([
            'success' => false,
            'message' => 'role Not Found',
        ], 404);

    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find role by ID
        $role = Role::findOrfail($id);

        if($role) {

            //delete role
            $role->delete();

            return response()->json([
                'success' => true,
                'message' => 'Role Deleted',
            ], 200);

        }

        //data role not found
        return response()->json([
            'success' => false,
            'message' => 'Role Not Found',
        ], 404);
    }
}
