<?php

namespace App\Http\Controllers;

use App\Models\Jenisaset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JenisasetController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table Jenisasets
        $Jenisasets = Jenisaset::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Jenisasete',
            'data'    => $Jenisasets
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
        //find Jenisaset by ID
        $Jenisaset = Jenisaset::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Jenisaset',
            'data'    => $Jenisaset
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
            'kode' => 'required|min:2|max:2|unique:tbl_jenis_aset',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $Jenisaset = Jenisaset::create([
            'nama'     => $request->nama,
            'kode'   => $request->kode
        ]);

        //success save to database
        if ($Jenisaset) {

            return response()->json([
                'success' => true,
                'message' => 'Jenisaset Created',
                'data'    => $Jenisaset
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Jenisaset Failed to Save',
        ], 409);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $Jenisaset
     * @return void
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama'   => 'required',
            'kode' => 'required|min:2|max:2|unique:tbl_jenis_aset',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find Jenisaset by ID
        $Jenisaset = Jenisaset::findOrFail($id);

        if ($Jenisaset) {

            //update Jenisaset
            $Jenisaset->update([
                'nama'     => $request->nama,
                'kode'   => $request->kode
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Jenisaset Updated',
                'data'    => $Jenisaset
            ], 200);
        }

        //data Jenisaset not found
        return response()->json([
            'success' => false,
            'message' => 'Jenisaset Not Found',
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
        //find Jenisaset by ID
        $Jenisaset = Jenisaset::findOrfail($id);

        if ($Jenisaset) {

            //delete Jenisaset
            $Jenisaset->delete();

            return response()->json([
                'success' => true,
                'message' => 'Jenisaset Deleted',
            ], 200);
        }

        //data Jenisaset not found
        return response()->json([
            'success' => false,
            'message' => 'Jenisaset Not Found',
        ], 404);
    }
}
