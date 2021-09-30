<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table Branchs
        $Branchs = Branch::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Branche',
            'data'    => $Branchs
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
        //find Branch by ID
        $Branch = Branch::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Branch',
            'data'    => $Branch
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
            'nama'   => 'required',
            'kode' => 'required|min:3|max:5|unique:tbl_branch',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $Branch = Branch::create([
            'nama'     => $request->nama,
            'kode'   => $request->kode
        ]);

        //success save to database
        if ($Branch) {

            // return response()->json([
            //     'success' => true,
            //     'message' => 'Branch Created',
            //     'data'    => $Branch
            // ], 201);
            return redirect('/');
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Branch Failed to Save',
        ], 409);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $Branch
     * @return void
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'kode' => 'required|min:3|max:5|unique:tbl_branch',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find Branch by ID
        $Branch = Branch::findOrFail($id);

        if ($Branch) {

            //update Branch
            $Branch->update([
                'nama'     => $request->nama,
                'kode'   => $request->kode
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Branch Updated',
                'data'    => $Branch
            ], 200);
        }

        //data Branch not found
        return response()->json([
            'success' => false,
            'message' => 'Branch Not Found',
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
        //find Branch by ID
        $Branch = Branch::findOrfail($id);

        if ($Branch) {

            //delete Branch
            $Branch->delete();

            return response()->json([
                'success' => true,
                'message' => 'Branch Deleted',
            ], 200);
        }

        //data Branch not found
        return response()->json([
            'success' => false,
            'message' => 'Branch Not Found',
        ], 404);
    }
}
