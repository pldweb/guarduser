
@extends('layouts.master')

@section('title', 'Table')


@section('content')

  {{-- <h1 class="h3 mb-4 text-gray-800">table</h1> --}}

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="font-weight-bold text-primary">Data Table barang</h6>
        <a href="{{ route('tambah.barang')}}" class=" btn btn-primary btn-sm mt-1">
          <i class="fas fa-plus"></i> Tambah Barang
        </a>
    </div>

    
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="80%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tujuan Barang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ( $barang as $no => $data )
                    <tr>
                      <td>{{ $barang->firstItem()+$no }}</td>
                      <td>{{ $data->nomor_barang }}</td>
                      <td>{{ $data->nama_barang }}</td>
                      <td>{{ $data->tujuan_barang }}</td>
                      <td class="text-center">
                        
                        <a data-id="{{ $data->id }}" class="btn btn-danger" id="swal-confirm" >
                          <form action="{{ route('hapus', $data->id)}}" id="delete{{$data->id}}" method="post">
                            @csrf
                            @method('delete')
                          </form>
                              <i class="fas fa-trash"></i> 
                        </a> 
                    
                        <a href="{{ route('edit', $data->id)}}" id="delete{{$data->id}}" class="btn btn-primary">
                          <i class="fas fa-edit"></i>
                        </a> 
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            {{ $barang->links() }}
        </div>
    </div>
</div>

@endsection

