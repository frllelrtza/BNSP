@extends('layouts.app')

@section('content')

      
        <!--  Row 1 -->

        <div class="row p-3 fw-bold">
          <div class="col-md-4">
              <div class="card" style="background-color: #FFF9D0">
                  <div class="card-header" style="background-color: #FFB319"></div>
                  <div class="card-body">
                      <h5 class="card-title fw-bolder">Total Pendapatan</h5>
                      <p class="card-text fw-bold">RP. {{ number_format($jumlahPendapatan, 0, ',', '.') }}</p>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card" style="background-color: #FFF9D0">
                  <div class="card-header" style="background-color: #FFB319"></div>
                  <div class="card-body">
                      <h5 class="card-title fw-bolder">Total Pengeluaran</h5>
                      <p class="card-text fw-bold">RP. {{ number_format($jumlahPengeluaran, 0, ',', '.') }}</p>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="background-color: #FFF9D0">
              <div class="card-header" style="background-color: #FFB319"></div>
              <div class="card-body">
                <h5 class="card-title fw-bolder">Total Produk</h5>
                <p class="card-text fw-bold ">{{ $jumlahProduk }}</p>
              </div>
            </div>
          </div>
        </div>
  
        <div class="row p-3">
          <div class="col-lg-12 d-flex align-items-stretch">
              <div class="card w-100">
                  <div class="card-body p-0" style="background-color: #FFF9D0;">
                      <h5 class="card-header fw-bolder mb-4 mt-0 mx" style="background-color: #FFB319; color:#000">Pemasukan / Pengeluaran</h5>
                      <div class="table-responsive">
                          <table class="table text-nowrap mb-0 align-middle">
                              <thead class="text-dark fs-4">
                                  <tr>
                                      <th class="border-bottom-0">
                                          <h6 class="fw-bolder mb-0">Tanggal</h6>
                                      </th>
                                      <th class="border-bottom-0">
                                          <h6 class="fw-bolder mb-0">Sumber Pendapatan / Pengeluaran</h6>
                                      </th>
                                      <th class="border-bottom-0">
                                          <h6 class="fw-bolder mb-0">Deskripsi</h6>
                                      </th>
                                      <th class="border-bottom-0">
                                          <h6 class="fw-bolder mb-0">Jumlah</h6>
                                      </th>
                                      <th class="border-bottom-0">
                                          <h6 class="fw-bolder mb-0">Tipe</h6>
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($laporan as $item)
                                  <tr>
                                      <td class="border-bottom-0">
                                          <p class="mb-0 fw-normal fs-3">{{ $item->tanggal }}</p>
                                      </td>
                                      <td class="border-bottom-0">
                                          <h6 class="fw-semibold mb-1 fs-3">{{ $item->sumber }}</h6>
                                      </td>
                                      <td class="border-bottom-0">
                                          <p class="mb-0 fw-normal fs-3">{{ $item->deskripsi }}</p>
                                      </td>
                                      <td class="border-bottom-0">
                                          <h6 class="fw-normal mb-0 fs-3">Rp. {{ number_format($item->jumlah, 0, ',', '.') }}</h6>
                                      </td>
                                      <td class="border-bottom-0">
                                          <p class="mb-0 fw-normal fs-3">{{ $item->tipe }}</p>
                                      </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>


          <div class="h-100 p-5  border rounded-3">
            <h2 class="mb-4 fw-bolder" style="color: #FFB319">Produk-Produk Pempek Elly</h2>
            <div class="overflow-auto">
              <div class="row flex-nowrap">
                @foreach ($produk as $produk)
                <div class="col-sm-6 col-xl-3 mb-4">
                    <div class="card overflow-hidden rounded-2 shadow-sm">
                        <div class="position-relative d-flex justify-content-center align-items-center" style="height: 250px; overflow: hidden;">
                            <img src="{{ asset('storage/produk/' . $produk->photo_produk) }}" class="img-fluid rounded" style="object-fit: cover; max-height: 100%; max-width: 100%;" alt="{{ $produk->nama_produk }}">
                            <div class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Cart">
                                <i class="ti ti-basket fs-4"></i>
                            </div>
                        </div>
                        <div class="card-body pt-3 p-4">
                            <h6 class="card-title fw-semibold fs-4">{{ $produk->nama_produk }}</h6>
                            <p class="card-text text-muted fs-5">{{ $produk->deskripsi_produk }}</p>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="fw-semibold fs-4 mb-0">Rp. {{ number_format($produk->harga, 0, ',', '.') }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
          </div>
          
    
      
        @endsection

