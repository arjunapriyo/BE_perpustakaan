<?php

namespace App\Http\Controllers;

use App\Models\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    //Fungsi Menambah Buku
    public function createbuku(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'judul_buku' => 'required',
            'penerbit' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $save = buku::create([
            'judul_buku' => $req->get('judul_buku'),
            'penerbit' => $req->get('penerbit'),
            'penulis' => $req->get('penulis'),
            'kategori' => $req->get('kategori'),
        ]);

        if ($save) {
            return response()->json(['status' => true, 'message' => 'Sukses menambahkan Buku']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambahkan Buku']);
        }
    }

    //Fungsi Update Buku
    public function updatebuku(Request $req, $id_buku)
    {
        $validator = Validator::make($req->all(), [
            'judul_buku' => 'required',
            'penerbit' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $ubah = buku::where('id_buku', $id_buku)->update([
            'judul_buku' => $req->get('judul_buku'),
            'penerbit' => $req->get('penerbit'),
            'penulis' => $req->get('penulis'),
            'kategori' => $req->get('kategori'),
        ]);

        if ($ubah) {
            return response()->json(['status' => true, 'message' => 'Sukses update Buku']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mengupdate Buku']);
        }
    }

    // Fungsi mendapatkan semua data buku
    public function getAllBuku()
    {
        $buku = buku::all();

        return response()->json(['status' => true, 'data' => $buku]);
    }

    // Fungsi mendapatkan detail buku berdasarkan ID
    public function getBukuById($id_buku)
    {
        $buku = buku::find($id_buku);

        if ($buku) {
            return response()->json(['status' => true, 'data' => $buku]);
        } else {
            return response()->json(['status' => false, 'message' => 'Buku tidak ditemukan']);
        }
    }

    // Fungsi menghapus buku
    public function deleteBuku($id_buku)
    {
        $buku = buku::find($id_buku);

        if ($buku) {
            $buku->delete();
            return response()->json(['status' => true, 'message' => 'Buku berhasil dihapus']);
        } else {
            return response()->json(['status' => false, 'message' => 'Buku tidak ditemukan']);
        }
    }
}