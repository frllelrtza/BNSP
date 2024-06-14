    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pengeluaran_create">
        + Tambah Pengeluaran
    </button>

    <!-- The Modal -->
    <div class="modal fade" id="pengeluaran_create" tabindex="-1" aria-labelledby="pengeluaran_create_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pengeluaranModalLabel">Form Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="pengeluaranCreateForm" method="POST" action="{{  route('pengeluaran.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                            <input type="date" class="form-control @error('tanggal_pengeluaran') is-invalid @enderror" name="tanggal_pengeluaran" value="{{ old('tanggal_pengeluaran') }}" placeholder="Masukkan Tanggal pengeluaran">
                            
                            <!-- error message untuk title -->
                            @error('tanggal_pengeluaran')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>                        
                        <div class="form-group">
                            <label for="sumber_pengeluaran">Sumber Pengeluaran</label>
                            <input type="text" class="form-control @error('sumber_pengeluaran') is-invalid @enderror" name="sumber_pengeluaran" value="{{ old('sumber_pengeluaran') }}" placeholder="Masukkan Sumber pengeluaran">
                            
                            <!-- error message untuk title -->
                            @error('sumber_pengeluaran')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror                        
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_pengeluaran">Deskripsi Pengeluaran</label>
                            <textarea class="form-control @error('deskripsi_pengeluaran') is-invalid @enderror" name="deskripsi_pengeluaran" rows="5" placeholder="Masukkan Deskripsi pengeluaran">{{ old('deskripsi_pengeluaran') }}</textarea>
                            
                            <!-- error message untuk content -->
                            @error('deskripsi_pengeluaran')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                            <input type="text" class="form-control @error('jumlah_pengeluaran') is-invalid @enderror" name="jumlah_pengeluaran" value="{{ old('jumlah_pengeluaran') }}" placeholder="Masukkan Jumlah pengeluaran">
                            
                                <!-- error message untuk title -->
                                @error('jumlah_pengeluaran')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
    