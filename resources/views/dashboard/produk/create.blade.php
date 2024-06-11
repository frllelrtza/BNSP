<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#produk_create">
    + Tambah Produk
</button>

<!-- The Modal -->
<div class="modal fade" id="produk_create" tabindex="-1" aria-labelledby="produk_create_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produkModalLabel">Form Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="produkCreateForm" method="POST" action="{{ route('produk.store') }}" enctype="multipart/form-data">
                    @csrf <!-- Direktif CSRF -->
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Masukkan Nama Produk">
                        
                        @error('nama_produk')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto_produk">Foto Produk</label>
                        <input type="file" class="form-control @error('foto_produk') is-invalid @enderror" name="foto_produk">
                        
                        @error('foto_produk')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_produk">Deskripsi Produk</label>
                        <textarea class="form-control @error('deskripsi_produk') is-invalid @enderror" name="deskripsi_produk" rows="5" placeholder="Masukkan Deskripsi Produk">{{ old('deskripsi_produk') }}</textarea>
                        
                        @error('deskripsi_produk')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok') }}" placeholder="Masukkan Stok Produk">
                        
                        @error('stok')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" placeholder="Masukkan Harga Produk">
                        
                        @error('harga')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
