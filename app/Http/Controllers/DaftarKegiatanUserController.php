<?php

namespace App\Http\Controllers;

use App\Models\KategoriKegiatan;
use App\Models\DaftarKegiatanUser;
use App\Models\Setting;
use App\Models\KategoriAnggota;
use App\Models\SubKategoriKegiatan;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DaftarKegiatanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kegiatan = Kegiatan::first();
        $user = Auth::user();
        $userID = Auth::user()->id;
        $daftar_kegiatan_user = DB::table('daftar_kegiatans')
            ->join('kegiatan', 'daftar_kegiatans.id_kegiatan', '=', 'kegiatan.id_kegiatan')
            ->join('users', 'daftar_kegiatans.id', '=', 'users.id')
            ->join('kategori_anggota', 'daftar_kegiatans.id_kategori_anggota', 'kategori_anggota.id_kategori_anggota')
            ->where('daftar_kegiatans.id_kategori_anggota', '=', $request->keyword)
            ->where('users.id', $userID)
            ->select('daftar_kegiatans.*', 'kegiatan.nama_kegiatan', 'users.name', 'users.email', 'kategori_anggota.nama_kategori_anggota', 'kegiatan.tanggal_kegiatan', 'kegiatan.jam_kegiatan', 'kegiatan.biaya_kegiatan as biaya_kegiatan_kegiatan')
            ->get();
        $select = DB::table('kategori_anggota')->get();
        $title = 'Data Pendaftaran Kegiatan';
        return view('daftar_kegiatan_user.index', compact('title', 'kegiatan', 'select', 'user', 'daftar_kegiatan_user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_anggota = KategoriAnggota::all();
        $kegiatan = Kegiatan::all();
        $user = User::all()->first();
        $title = 'Tambah Daftar Kegiatan';
        return view('daftar_kegiatan_user.create', compact('kegiatan', 'kategori_anggota', 'user', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'id_kegiatan' => 'required',
            'id_kategori_anggota' => 'required',
            'biaya_kegiatan' => 'required',
            'bukti_pembayaran' => 'sometimes:jpg, jpeg, png, gif, raw, tiff'


        ]);

        if($request->hasFile('bukti_pembayaran')){
            $file = $request->file('bukti_pembayaran');
            $namafile = 'Bukti Pembayaran' . date('Ymdhis') . '.' . $request->file('bukti_pembayaran')->getClientOriginalExtension();
            $file->move('file/pembayaran/', $namafile);

            $kupon = $request->input('kupon');
            $data = new DaftarKegiatanUser();
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
            return redirect()->route('daftar_kegiatan_user.index')->with('Sukses', 'Pendaftaran Anda Sukses !!');
        }else{
            $kupon = $request->input('kupon');
            $data = new DaftarKegiatanUser();
            $data->id = Auth::user()->id;
            $data->id_kegiatan = $request->id_kegiatan;
            $data->id_kategori_anggota = $request->id_kategori_anggota;
            $data->tanggal_kegiatan = $request->tanggal_kegiatan;
            $data->kupon = $request->kupon;
            $data->biaya_kegiatan = $request->biaya_kegiatan; // Ganti dengan nilai sesuai kebutuhan
            $data->potongan_harga = $request->potongan_harga; // Ganti dengan nilai sesuai kebutuhan



            // Validasi kupon dan terapkan potongan harga jika kupon sesuai
            if ($kupon == 'ROBERTH10') {
                $data->biaya_kegiatan -= $request->potongan_harga; // Ganti dengan nilai potongan sesuai kebutuhan
            }
            $data->save();
            return redirect()->route('daftar_kegiatan_user.index')->with('Sukses', 'Pendaftaran Anda Sukses !!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarKegiatanUser $daftar_kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $daftar_kegiatan_user = DaftarKegiatanUser::find($id);
        $kategori_anggota = KategoriAnggota::all();
        $kegiatan = Kegiatan::all();
        $user = User::all();
        $title = 'Edit Daftar Kegiatan';
        return view('daftar_kegiatan_user.edit', compact('kegiatan', 'daftar_kegiatan_user', 'title', 'user', 'kategori_anggota', 'daftar_kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarKegiatanUser $daftar_kegiatan_user)
    {

        $update = [

            'id_kegiatan' => $request->id_kegiatan,
            'id' => $request->id,
            'id_kategori_anggota' => $request->id_kategori_anggota,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'biaya_kegiatan' => $request->biaya_kegiatan,
            'kupon' => $request->kupon,
            'potongan_harga' => $request->potongan_harga,
            'bukti_pembayaran' => $request->bukti_pembayaran,
        ];

        $daftar_kegiatan_user->update($update);
        return redirect()->route('daftar_kegiatan_user.index')->with('Sukses', 'Berhasil Edit Kegiatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = DaftarKegiatanUser::findorfail($id);
        // delete data dri database
        $hapus->delete();
        return redirect()->back()->with('Sukses', 'Berhasil Batal Data Daftar Kegiatan');
    }

    public function invoice($id)
    {
        $konf = Setting::first();
        $user = User::all()->first();
        $daftar_kegiatan_user = DB::table('daftar_kegiatans')
            ->join('kegiatan', 'daftar_kegiatans.id_kegiatan', '=', 'kegiatan.id_kegiatan')
            ->join('users', 'daftar_kegiatans.id', '=', 'users.id')
            ->join('kategori_anggota', 'daftar_kegiatans.id_kategori_anggota', 'kategori_anggota.id_kategori_anggota')
            ->select('daftar_kegiatans.*', 'kegiatan.nama_kegiatan', 'users.name', 'users.email', 'kategori_anggota.nama_kategori_anggota', 'kegiatan.tanggal_kegiatan', 'kegiatan.jam_kegiatan', 'kegiatan.biaya_kegiatan as biaya_kegiatan_kegiatan')
            ->where('id_daftar_kegiatan', $id)
            ->first();

        $title = 'Data Invoice';
        return view('daftar_kegiatan_user.invoice', compact('title', 'konf', 'user', 'daftar_kegiatan_user'));
    }
}
