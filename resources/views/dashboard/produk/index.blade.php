@extends('layouts.app')

@section('content')

<div class="card" style="background-color: #FFEEA9">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-4">Produk</h5>
        @include('dashboard.produk.create')
    </div>
</div>

<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-0" style="background-color: #FFF9D0;">
            <h5 class="card-header fw-bolder mb-4 mt-0 mx" style="background-color: #FFB319; color:#000">Produk Pempek Elly</h5>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0"><h6 class="fw-bolder mb-0">Nama Produk</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-bolder mb-0">Photo Produk</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-bolder mb-0">Stok</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-bolder mb-0">Harga</h6></th>
                            <th class="border-bottom-0"><h6 class="fw-bolder mb-0">Aksi</h6></th>
                        </tr>
                    </thead>
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                    @endif
                    <tbody>
                        @if($produk->count() > 0)
                        @foreach ($produk as $item)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1 fs-3">{{ $item->nama_produk }}</h6>
                                <span class="fw-normal fs-3">{{ $item->deskripsi_produk }}</span>
                            </td>
                            <td class="border-bottom-0">
                                <img src="{{asset('storage/produk/'. $item->photo_produk) }}" class="img-square rounded" style="width: 120px; height: 100px; object-fit: cover;" alt="..."></a>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-normal mb-0 fs-3">{{ $item->stok }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-normal mb-0 fs-3">Rp. {{ number_format($item->harga, 0, ',', '.') }}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-normal mb-0 fs-3">
                                    @include('dashboard.produk.edit', ['produk' => $item])
                                    <form id="deleteForm_{{ $item->id }}" action="{{ route('produk.destroy', $item->id) }}" method="POST" class="btn btn-danger p-0 me-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger m-0 deleteButton" data-id="{{ $item->id }}">
                                            <i class="ti ti-trash fs-4"></i> <span>Delete</span>
                                        </button>
                                    </form>
                                </h6>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="5">Belum ada pendapatan yang dimasukan!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    //message with toastr
    @if(session()->has('success'))
        toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    @elseif(session()->has('error'))
        toastr.error('{{ session('error') }}', 'GAGAL!'); 
    @endif

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.deleteButton').forEach(function (button) {
            button.addEventListener('click', function () {
                var id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Delete?',
                    text: "Are you sure you want to delete this data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm_' + id).submit();
                    }
                });
            });
        });
    });
</script>

@endsection