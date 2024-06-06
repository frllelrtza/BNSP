<!-- Button to Open the Modal -->
<button type="button" class="btn btn-warning me-2" data-toggle="modal" data-target="#pengeluaran_edit{{ $pengeluaran->id }}">
    <i class="ti ti-edit fs-4"></i>
    <span>Edit</span>
</button>

<!-- The Modal -->
<div class="modal fade" id="pengeluaran_edit{{ $pengeluaran->id }}" tabindex="-1" aria-labelledby="pengeluaran_edit_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pendapatanModalLabel">Form Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pendapatanEditForm" method="POST" action="{{ route('pengeluaran.update', $pengeluaran->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                        <input type="date" class="form-control @error('tanggal_pengeluaran') is-invalid @enderror" name="tanggal_pengeluaran" value="{{ old('tanggal_pengeluaran', $pengeluaran->tanggal_pengeluaran) }}" placeholder="Masukkan Tanggal Pengeluaran">
                        
                        @error('tanggal_pengeluaran')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>                        
                    <div class="form-group">
                        <label for="sumber_pengeluaran">Sumber Pengeluaran</label>
                        <input type="text" class="form-control @error('sumber_pengeluaran') is-invalid @enderror" name="sumber_pengeluaran" value="{{ old('sumber_pengeluaran', $pengeluaran->sumber_pengeluaran) }}" placeholder="Masukkan Sumber Pengeluaran">
                        
                        @error('sumber_pengeluaran')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror                        
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_pengeluaran">Deskripsi Pengeluaran</label>
                        <textarea class="form-control @error('deskripsi_pengeluaran') is-invalid @enderror" name="deskripsi_pengeluaran" rows="5" placeholder="Masukkan Deskripsi Pengeluaran">{{ old('deskripsi_pengeluaran', $pengeluaran->deskripsi_pengeluaran) }}</textarea>
                        
                        @error('deskripsi_pengeluaran')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pengeluaran">Jumlah Pengeluaran</label>
                        <input type="text" class="form-control @error('jumlah_pengeluaran') is-invalid @enderror" name="jumlah_pengeluaran" value="{{ old('jumlah_pengeluaran', $pengeluaran->jumlah_pengeluaran) }}" placeholder="Masukkan Jumlah Pengeluaran">
                        
                        @error('jumlah_pengeluaran')
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
