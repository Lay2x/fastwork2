<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use App\Models\DaftarKegiatan;
use App\Models\KategoriAnggota;
use App\Models\Kegiatan;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konf = Setting::first();

        $daftar = DB::table('kegiatan')
            ->join('kategori_kegiatan', 'kegiatan.id_kategori_kegiatan', 'kategori_kegiatan.id_kategori_kegiatan')
            ->join('sub_kategori_kegiatan', 'kegiatan.id_sub_kategori_kegiatan', 'sub_kategori_kegiatan.id_sub_kategori_kegiatan')
            ->join('status_kegiatan', 'kegiatan.id_status_kegiatan', 'status_kegiatan.id_status_kegiatan')
            ->join('publish_kegiatan', 'kegiatan.id_publish_kegiatan', 'publish_kegiatan.id_publish_kegiatan')
            ->first();

        $kategori_anggota = KategoriAnggota::all();
        $kegiatan = Kegiatan::all();
        $user = User::all()->first();

        return view('welcome', compact('konf','daftar', 'kategori_anggota', 'user', 'kegiatan'));
    }

    
    public function store(Request $request)
    {
        $request->validate([

            'id_kegiatan' => 'required',
            'id_kategori_anggota' => 'required',
            'biaya_kegiatan' => 'required',


        ]);
        $file = $request->file('bukti_pembayaran');
        $namafile = 'Bukti Pembayaran' . date('Ymdhis') . '.' . $request->file('bukti_pembayaran')->getClientOriginalExtension();
        $file->move('file/pembayaran/', $namafile);

        $kupon = $request->input('kupon');
        $data = new DaftarKegiatan();
        $data->id = Auth::user()->id;
        $data->id_kegiatan = $request->id_kegiatan;
        $data->id_kategori_anggota = $request->id_kategori_anggota;
        $data->tanggal_kegiatan = $request->tanggal_kegiatan;
        $data->bukti_pembayaran = $namafile;
        $data->kupon = $request->kupon;
        $data->biaya_kegiatan = $request->biaya_kegiatan; // Ganti dengan nilai sesuai kebutuhan
        $data->potongan_harga = $request->potongan_harga; // Ganti dengan nilai sesuai kebutuhan



        // Validasi kupon dan terapkan potongan harga jika kupon sesuai
        if ($kupon == 'ROBERTH10') {
            $data->biaya_kegiatan -= $request->potongan_harga; // Ganti dengan nilai potongan sesuai kebutuhan
        }
        $data->save();
        return redirect()->route('daftar_kegiatan.index')->with('Sukses', 'Pendaftaran Anda Sukses !!');
    }

   
}
