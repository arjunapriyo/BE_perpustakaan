<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class PeminjamanController extends Controller
{
    public function P1(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'id_siswa' => 'required',
            // 'id_kelas'=>'required',
            'id_buku' => 'required',
        ]);
        if ($validator->fails()) {
            return Response()->json($validator->errors()->toJson());
        }
        $tenggat = carbon::now()->addDays(4);
        $save = peminjaman::create([
            'id_siswa' => $req->get('id_siswa'),
            // 'id_kelas'=>$req->get('id_kelas'),
            'id_buku' => $req->get('id_buku'),
            'tgl_pinjam' => date('Y-m-d H:i:s'),
            'tgl_kembali' => ($tenggat),
            'status' => 'Dipinjam',
        ]);
        if ($save) {
            return Response()->json(['status' => true, 'message' => 'Sukses Menambah Peminjam']);
        } else {
            return Response()->json(["status" => false, 'message' => 'Gagal Menambah Peminjaman']);
        }
    }

    public function kembalipeminjaman($id)
    {
        $tgl_kembali = Carbon::now();
        $hapus = peminjaman::where('id_peminjaman', "=", $id)
            ->update([
                'status' => 'Kembali',
                'tgl_kembali' => $tgl_kembali
            ]);
        if ($hapus) {
            return Response()->json(['status' => true, 'message' => 'Sukses Mengembalikan buku ']);
        } else {
            return Response()->json(['status' => false, 'message' => 'Gagal Mengembalikan buku ']);
        }
    }
}