@extends('layouts.app')

@section('content')

<div class="card" style="background-color: #FFEEA9">
    <div class="card-body">
      <h5 class="card-title fw-bolder mb-4">Produk</h5>
      <a href="" class="btn btn-success fw-bolder" style="background-color: #fa896b">+ Tambah Data</a>
    </div>
</div>

<div class="col-lg-12 d-flex align-items-stretch" >
    <div class="card w-100">
      <div class="card-body p-0" style="background-color: #FFF9D0;">
        <h5 class="card-header fw-bolder mb-4 mt-0 mx" style="background-color: #FFB319; color:#000" >Produk Pempek Elly </h5>
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-bolder mb-0">Nama</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-bolder mb-0">Stok</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-bolder mb-0">Harga</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-bolder mb-0">Aksi</h6>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-semibold mb-1 fs-3">Paket 10 Lenjer Besar</p>
                  <span class="fw-normal fs-3">Berisi 10 Pempek Lenjer Besar</span>                          
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-normal mb-0 fs-3">20</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-normal mb-0 fs-3">Rp. 50.000</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-normal mb-0 fs-3"></h6>
                </td>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection