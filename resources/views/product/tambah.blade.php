
@extends('layouts.master')

@section('title', 'Table')


@section('content')

  {{-- <h1 class="h3 mb-4 text-gray-800">table</h1> --}}

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary">Masukan Data Table barang</h6>
    </div>

    
    <div class="card-body">
        
                <form action="{{ route('simpan')}}" method="post">
                  @csrf
                  <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 ">
                      <label class="font-weight-bold">Kode barang</label>
                      <input type="text" name="nomor_barang" class="form-control @error('nomor_barang') is-invalid @enderror" value="{{ old('nomor_barang') }}" autofocus placeholder="Masukan Nomor Barang">
                      @error('nomor_barang')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                      <label class="font-weight-bold">Nama barang</label>
                      <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" placeholder="Masukkan Nama barang">
                      @error('nama_barang')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12 col-lg-6">
                      <label class="font-weight-bold ">Tujuan Barang</label>
                      <input type="text" name="tujuan_barang" class="form-control @error('tujuan_barang') is-invalid @enderror" value="{{ old('tujuan_barang') }}" placeholder="Masukkan Tujuan barang">
                      @error('tujuan_barang')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  <button class="btn btn-warning" type="reset">Reset</button>
                </div>
                </form>
            
        </div>
</div>


@endsection