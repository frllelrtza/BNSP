<!-- Button to Open the Modal -->
<button type="button" class="btn btn-warning me-2" data-toggle="modal" data-target="#pendapatan_edit_{{ $pendapatan->id }}">
    <i class="ti ti-edit fs-4"></i>
    <span>Edit</span>
</button>

<!-- The Modal -->
<div class="modal fade" id="pendapatan_edit_{{ $pendapatan->id }}" tabindex="-1" aria-labelledby="pendapatan_edit_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pendapatanModalLabel">Form Pendapatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pendapatanEditForm" method="POST" action="{{ route('pendapatan.update', $pendapatan->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tanggal_pendapatan">Tanggal Pendapatan</label>
                        <input type="date" class="form-control @error('tanggal_pendapatan') is-invalid @enderror" name="tanggal_pendapatan" value="{{ old('tanggal_pendapatan', $pendapatan->tanggal_pendapatan) }}" placeholder="Masukkan Tanggal Pendapatan">
                        
                        @error('tanggal_pendapatan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>                        
                    <div class="form-group">
                        <label for="sumber_pendapatan">Sumber Pendapatan</label>
                        <input type="text" class="form-control @error('sumber_pendapatan') is-invalid @enderror" name="sumber_pendapatan" value="{{ old('sumber_pendapatan', $pendapatan->sumber_pendapatan) }}" placeholder="Masukkan Sumber Pendapatan">
                        
                        @error('sumber_pendapatan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror                        
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_pendapatan">Deskripsi Pendapatan</label>
                        <textarea class="form-control @error('deskripsi_pendapatan') is-invalid @enderror" name="deskripsi_pendapatan" rows="5" placeholder="Masukkan Deskripsi Pendapatan">{{ old('deskripsi_pendapatan', $pendapatan->deskripsi_pendapatan) }}</textarea>
                        
                        @error('deskripsi_pendapatan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pendapatan">Jumlah Pendapatan</label>
                        <input type="text" class="form-control @error('jumlah_pendapatan') is-invalid @enderror" name="jumlah_pendapatan" value="{{ old('jumlah_pendapatan', $pendapatan->jumlah_pendapatan) }}" placeholder="Masukkan Jumlah Pendapatan">
                        
                        @error('jumlah_pendapatan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
