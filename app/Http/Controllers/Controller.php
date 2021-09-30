<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Branch;
use App\Models\Jenisaset;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function generateKodeJenisAset($id)
    {
        try {
            $post = Jenisaset::where('id', $id)->get();
            return $post[0]['kode'];
        } catch (\Throwable $th) {
            return "id salah";
        }
    }

    public function generateKodeBranch($id)
    {
        try {
            $post = Branch::where('id', $id)->get();
            return $post[0]['kode'];
        } catch (\Throwable $th) {
            return "id salah";
        }
    }

    public function getQueryNumber($code)
    {
        $query = Aset::where('kode_unik', 'like', '%' . $code . '%')->get();
        $jumlah = count($query);
        $query_number = $jumlah + 1;
        if ($jumlah < 10) {
            return "0" . $query_number;
        }
        return $query_number;
    }

    public function scanQR($jenis, $branch, $bulan, $tahun, $query)
    {
        $generateJenis = Jenisaset::where('kode', $jenis)->get();
        $nama_jenis = $generateJenis[0]['nama'];

        $generatebranch = Branch::where('kode', $branch)->get();
        $nama_branch = $generatebranch[0]['nama'];

        $bulan = $this->generateNamaBulan($bulan);

        $nama_tahun = "20" . $tahun;

        $hasil = $nama_jenis . " area " . $nama_branch . " pembelian bulan " . $bulan . " tahun " . $nama_tahun . " ke " . $query;
        //return $hasil;
        return view('asets/scanQR', ['hasil' => $hasil]);
    }

    private function generateNamaBulan($bulan)
    {
        if ($bulan == "01") {
            return "Januari";
        }
        if ($bulan == "02") {
            return "Februari";
        }
        if ($bulan == "03") {
            return "Maret";
        }
        if ($bulan == "04") {
            return "April";
        }
        if ($bulan == "05") {
            return "Mei";
        }
        if ($bulan == "06") {
            return "Juni";
        }
        if ($bulan == "07") {
            return "Juli";
        }
        if ($bulan == "08") {
            return "Agustus";
        }
        if ($bulan == "10") {
            return "Oktober";
        }
        if ($bulan == "11") {
            return "November";
        }
        if ($bulan == "12") {
            return "Desember";
        }
    }
    public function halamanIndex()
    {
        // mengambil data dari table aset
        $aset = DB::table('tbl_aset')->get();
        //return view('template', ['aset' => $aset]);
        // mengirim data aset ke view index
        return view('index', ['aset' => $aset]);
    }



    public function halamanTambah()
    {
        // mengambil data dari table aset
        $aset = DB::table('tbl_jenis_aset')->get();
        $branch = DB::table('tbl_branch')->get();

        //return view('template', ['aset' => $aset]);
        // mengirim data aset ke view index
        return view('asets/tambah', ['aset' => $aset], ['branch' => $branch]);
    }

    public function halamanTambahbranch()
    {
        return view('asets/tambahbranch');
    }

    public function halamanTambahjenis()
    {
        return view('asets/tambahjenis');
    }
}
