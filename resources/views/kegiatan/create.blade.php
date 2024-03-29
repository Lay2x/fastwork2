@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $title }}</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Error!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group mb-2">
                            <label for="">Kategori Kegiatan</label>
                            <select name="id_kategori_kegiatan" id="kegiatan-dd" class="form-control">
                                <option value=""></option>
                                @foreach ($kategori_kegiatan as $row)
                                    <option value="{{ $row->id_kategori_kegiatan }}">{{ $row->nama_kategori_kegiatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Sub Kategori Kegiatan</label>
                            <select name="id_sub_kategori_kegiatan" id="sub-dd" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Nama Kegiatan</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama kegiatan disini..."
                                name="nama_kegiatan" value="{{ old('nama_kegiatan') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Deskripsi Kegiatan</label>
                            <textarea name="deskripsi_kegiatan" id="editor" cols="30" rows="10">{{ old('deskripsi_kegiatan') }}</textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Tanggal Kegiatan</label>
                            <input type="date" name="tanggal_kegiatan" class="form-control"
                                value="{{ old('tanggal_kegiatan') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Jam Kegiatan</label>
                            <input type="time" name="jam_kegiatan" class="form-control"
                                value="{{ old('jam_kegiatan') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Biaya Kegiatan *Kosongkan Apabila tidak pungut biaya </label>
                            <input type="number" name="biaya_kegiatan" class="form-control"
                                value="{{ old('biaya_kegiatan') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Kupon *Kosongkan Apabila tidak ada </label>
                            <input type="text" name="kupon" class="form-control" value="{{ old('kupon') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Potongan harga *Kosongkan Apabila tidak ada </label>
                            <input type="number" name="potongan_harga" class="form-control"
                                value="{{ old('potongan_harga') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Status </label>
                            <select name="id_status_kegiatan" id="dropdown" class="form-control">
                                <option value=""></option>
                                @foreach ($status_kegiatan as $row)
                                    <option value="{{ $row->id_status_kegiatan }}">{{ $row->nama_status_kegiatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Publish </label>
                            <select name="id_publish_kegiatan" id="dropdown" class="form-control">
                                <option value=""></option>
                                @foreach ($publish_kegiatan as $row)
                                    <option value="{{ $row->id_publish_kegiatan }}">{{ $row->nama_publish_kegiatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Foto <abbr title="" style="color: black">*</abbr> </label>
                            <input id="inputImg" type="file" accept="image/*" name="gambar_kegiatan"
                                class="form-control"  />
                            <img class="d-none w-25 h-25 my-2" id="previewImg" src="#" alt="Preview image">
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-dark">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@section('script')
    <script>
        document.getElementById('inputImg').addEventListener('change', function() {
            // Get the file input value and create a URL for the selected image
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').setAttribute('src', e.target.result);
                    document.getElementById('previewImg').classList.add("d-block");
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
    
    
@endsection
@endsection
