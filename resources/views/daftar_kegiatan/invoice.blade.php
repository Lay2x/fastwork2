@extends('layouts.admin')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tagihan Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #invoice {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .invoice-header,
        .invoice-body,
        .invoice-footer {
            margin-bottom: 20px;
        }

        .invoice-header h2 {
            color: #333;
        }

        .invoice-body table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .invoice-body th,
        .invoice-body td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .invoice-footer p {
            text-align: right;
        }
    </style>
</head>

<div id="invoice">
    <div class="invoice-header">
        <h2>{{$konf->instansi_setting}}</h2>
        <p>{{$konf->alamat_setting}}</p>
    </div>

    <div class="invoice-body">
        <table>
            <thead>
                <tr>
                    
                    <th>Nama Kegiatan</th>
                    <th>Peserta</th>
                    <th>Email</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Biaya Kegiatan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                    <td>{{$daftar_kegiatan->nama_kegiatan}}</td>
                    <td>{{$daftar_kegiatan->name}}</td>
                    <td>{{$daftar_kegiatan->email}}</td>
                    <td>{{ Carbon\Carbon::parse($daftar_kegiatan->tanggal_kegiatan)->isoFormat('dddd,D MMMM Y') }}</td>
                    <td>Rp. {{number_format($daftar_kegiatan->biaya_kegiatan)}}</td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="invoice-footer">
        <p>Total Tagihan: Rp. {{number_format($daftar_kegiatan->biaya_kegiatan)}}</p>
        <p>Tanggal Tagihan: {{ Carbon\Carbon::parse($daftar_kegiatan->tanggal_kegiatan)->isoFormat('dddd,D MMMM Y') }}</p>
    </div>
</div>


@endsection