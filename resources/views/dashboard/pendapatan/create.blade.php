    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pendapatan_create">
        + Tambah Pendapatan
    </button>

    <!-- The Modal -->
    <div class="modal fade" id="pendapatan_create" tabindex="-1" aria-labelledby="pendapatan_create_label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pendapatanModalLabel">Form Pendapatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="pendapatanCreateForm" method="POST" action="{{  route('pendapatan.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tanggal_pendapatan">Tanggal Pendapatan</label>
                            <input type="date" class="form-control @error('tanggal_pendapatan') is-invalid @enderror" name="tanggal_pendapatan" value="{{ old('tanggal_pendapatan') }}" placeholder="Masukkan Tanggal Pendapatan">
                            
                            <!-- error message untuk title -->
                            @error('tanggal_pendapatan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>                        
                        <div class="form-group">
                            <label for="sumber_pendapatan">Sumber Pendapatan</label>
                            <input type="text" class="form-control @error('sumber_pendapatan') is-invalid @enderror" name="sumber_pendapatan" value="{{ old('sumber_pendapatan') }}" placeholder="Masukkan Sumber Pendapatan">
                            
                            <!-- error message untuk title -->
                            @error('sumber_pendapatan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror                        
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_pendapatan">Deskripsi Pendapatan</label>
                            <textarea class="form-control @error('deskripsi_pendapatan') is-invalid @enderror" name="deskripsi_pendapatan" rows="5" placeholder="Masukkan Deskripsi Pendapatan">{{ old('deskripsi_pendapatan') }}</textarea>
                            
                            <!-- error message untuk content -->
                            @error('deskripsi_pendapatan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pendapatan">Jumlah Pendapatan</label>
                            <input type="text" class="form-control @error('jumlah_pendapatan') is-invalid @enderror" name="jumlah_pendapatan" value="{{ old('jumlah_pendapatan') }}" placeholder="Masukkan Jumlah Pendapatan">
                            
                                <!-- error message untuk title -->
                                @error('jumlah_pendapatan')
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
    