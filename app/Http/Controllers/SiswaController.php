<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    //Fungsi tambah Siswa
    public function createsiswa(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'id_kelas' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $save = Siswa::create([
            'nama_siswa' => $req->get('nama_siswa'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender' => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'id_kelas' => $req->get('id_kelas'),
        ]);

        if ($save) {
            return response()->json(['status' => true, 'message' => 'Sukses menambahkan siswa']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal menambahkan siswa']);
        }
    }

    //Fugsi tampil siswa
    public function index()
    {
        $siswa = Siswa::with('kelas')->get(); // 'kelas' adalah relasi ke model Kelas
        return response()->json($siswa);
    }

    // Fungsi mendapatkan detail siswa berdasarkan ID
    public function getSiswaById($id)
    {
        $siswa = Siswa::find($id);
        

        if ($siswa) {
            return response()->json(['status' => true, 'data' => $siswa]);
        } else {
            return response()->json(['status' => false, 'message' => 'Siswa tidak ditemukan']);
        }
    }

    // Fungsi update siswa
    public function updatesiswa(Request $req, $id)
    {
        $validator = Validator::make($req->all(), [
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'id_kelas' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson());
        }

        $ubah = Siswa::where('id', $id)->update([
            'nama_siswa' => $req->get('nama_siswa'),
            'tanggal_lahir' => $req->get('tanggal_lahir'),
            'gender' => $req->get('gender'),
            'alamat' => $req->get('alamat'),
            'id_kelas' => $req->get('id_kelas'),
        ]);

        if ($ubah) {
            return response()->json(['status' => true, 'message' => 'Sukses update siswa']);
        } else {
            return response()->json(['status' => false, 'message' => 'Gagal mengupdate siswa']);
        }
    }
    // Fungsi menghapus siswa
    public function deleteSiswa($id)
    {
        $siswa = Siswa::find($id);

        if ($siswa) {
            $siswa->delete();
            return response()->json(['status' => true, 'message' => 'Siswa berhasil dihapus']);
        } else {
            return response()->json(['status' => false, 'message' => 'Siswa tidak ditemukan']);
        }
    }
}