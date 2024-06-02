@extends('layouts.app')

@section('content')

      
        <!--  Row 1 -->

        <div class="row p-3 fw-bold">
          <div class="col-md-4">
            <div class="card" style="background-color: #FFF9D0">
              <div class="card-header" style="background-color: #FFB319"></div>
              <div class="card-body">
                <h5 class="card-title fw-bolder">Jumlah Pendapatan</h5>
                <p class="card-text fw-bold ">RP. 10000000</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="background-color: #FFF9D0">
              <div class="card-header" style="background-color: #FFB319"></div>
              <div class="card-body">
                <h5 class="card-title fw-bolder">Jumlah Pendapatan</h5>
                <p class="card-text fw-bold ">RP. 10000000</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="background-color: #FFF9D0">
              <div class="card-header" style="background-color: #FFB319"></div>
              <div class="card-body">
                <h5 class="card-title fw-bolder">Jumlah Pendapatan</h5>
                <p class="card-text fw-bold ">RP. 10000000</p>
              </div>
            </div>
          </div>
        </div>
  
        <div class="row p-3">
          <div class="col-lg-12 d-flex align-items-stretch" >
            <div class="card w-100">
              <div class="card-body p-0" style="background-color: #FFF9D0;">
                <h5 class="card-header fw-bolder mb-4 mt-0 mx" style="background-color: #FFB319; color:#000" >Pemasukan / Pengeluaran</h5>
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
                          <h6 class="fw-bolder mb-0">Jumlah</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal fs-3">2023-07-27</p>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-1 fs-3">Penjualan Pempek</h6>
                          <span class="fw-normal fs-3">5 Paket Pempek Lenjer</span>                          
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-normal mb-0 fs-3">Rp. 4.000.000</h6>
                        </td>
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

                <div class="col-sm-6 col-xl-3">
                  <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                      <img src="../assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
                      <div class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></div>
                    </div>
                    <div class="card-body pt-3 p-4">
                      <h6 class="card-title fw-semibold fs-4">Paket Campur isi 20</h6>
                      <h6 class="card-title fw-normal fs-3">Pempek Telor 8, Pempek Lenjer Kecil 6, Pempek Adaan 6 </h6>
                      <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">Rp. 50.000 </h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                      <img src="../assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
                      <div class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></div>
                    </div>
                    <div class="card-body pt-3 p-4">
                      <h6 class="card-title fw-semibold fs-4">Paket Campur isi 20</h6>
                      <h6 class="card-title fw-normal fs-3">Pempek Telor 8, Pempek Lenjer Kecil 6, Pempek Adaan 6 </h6>
                      <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">Rp. 50.000 </h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                      <img src="../assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
                      <div class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></div>
                    </div>
                    <div class="card-body pt-3 p-4">
                      <h6 class="card-title fw-semibold fs-4">Paket Campur isi 20</h6>
                      <h6 class="card-title fw-normal fs-3">Pempek Telor 8, Pempek Lenjer Kecil 6, Pempek Adaan 6 </h6>
                      <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">Rp. 50.000 </h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                      <img src="../assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
                      <div class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></div>
                    </div>
                    <div class="card-body pt-3 p-4">
                      <h6 class="card-title fw-semibold fs-4">Paket Campur isi 20</h6>
                      <h6 class="card-title fw-normal fs-3">Pempek Telor 8, Pempek Lenjer Kecil 6, Pempek Adaan 6 </h6>
                      <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">Rp. 50.000 </h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                  <div class="card overflow-hidden rounded-2">
                    <div class="position-relative">
                      <img src="../assets/images/products/s11.jpg" class="card-img-top rounded-0" alt="..."></a>
                      <div class="bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><i class="ti ti-basket fs-4"></i></div>
                    </div>
                    <div class="card-body pt-3 p-4">
                      <h6 class="card-title fw-semibold fs-4">Paket Campur isi 20</h6>
                      <h6 class="card-title fw-normal fs-3">Pempek Telor 8, Pempek Lenjer Kecil 6, Pempek Adaan 6 </h6>
                      <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">Rp. 50.000 </h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
    
      
        @endsection

