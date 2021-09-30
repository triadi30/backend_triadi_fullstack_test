<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsetController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table Asets
        $Asets = Aset::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Asete',
            'data'    => $Asets
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
        //find Aset by ID
        $Aset = Aset::findOrfail($id);
        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Aset',
            'data'    => $Aset
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
            'id_jenis'   => 'required|exists:tbl_jenis_aset,id',
            'id_branch' => 'required|exists:tbl_branch,id',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $Aset = Aset::create([
            'id_jenis'     => $request->id_jenis,
            'id_branch'   => $request->id_branch
        ]);


        $kode_jenis = $this->generateKodeJenisAset($request->id_jenis);
        $kode_branch = $this->generateKodeBranch($request->id_branch);
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $code_query = $kode_jenis . $kode_branch . $bulan . $tahun;
        $query_number = $this->getQueryNumber($code_query);
        $kode_unik = $code_query . $query_number;
        //success save to database
        if ($Aset) {
            $this->addKodeUnik($Aset['id'], $kode_unik);
            $this->addUrlQrCode($Aset['id'], $kode_jenis, $kode_branch, $bulan, $tahun, $query_number);
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Aset Created',
            //     'data'    => $Aset
            // ], 201);
            //Alert::success('Alhamdulillah', 'Data Aset berhasil ditambahkan');
            return redirect('/');
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Aset Failed to Save',
        ], 409);
    }

    private function addKodeUnik($id, $kode_unik)
    {
        $Aset = Aset::findOrFail($id);
        $Aset->update([
            'kode_unik'     => $kode_unik
        ]);
    }

    private function addUrlQrCode($id, $jenis, $branch, $bulan, $tahun, $query)
    {
        //$uri = `fullstack_test/triadiqr/{$jenis}/{$branch}/{$bulan}/{$tahun}/{$query}`;
        $URL_QR_CODE = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . env('APP_URL') . "/fullstack_test/triadiqr/" . $jenis . "/" . $branch . "/" . $bulan . "/" . $tahun . "/" . $query;

        $Aset = Aset::findOrFail($id);
        $Aset->update([
            'link_qr_code'     => $URL_QR_CODE
        ]);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $Aset
     * @return void
     */
    public function update(Request $request, $id)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'id_jenis'   => 'required',
            'id_branch' => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find Aset by ID
        $Aset = Aset::findOrFail($id);

        if ($Aset) {

            //update Aset
            $Aset->update([
                'id_jenis'     => $request->id_jenis,
                'id_branch'   => $request->id_branch
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Aset Updated',
                'data'    => $Aset
            ], 200);
        }

        //data Aset not found
        return response()->json([
            'success' => false,
            'message' => 'Aset Not Found',
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
        //find Aset by ID
        $Aset = Aset::findOrfail($id);

        if ($Aset) {

            //delete Aset
            $Aset->delete();

            return response()->json([
                'success' => true,
                'message' => 'Aset Deleted',
            ], 200);
        }

        //data Aset not found
        return response()->json([
            'success' => false,
            'message' => 'Aset Not Found',
        ], 404);
    }
}
