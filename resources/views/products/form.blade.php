<div class="mb-3">
    <label for="kode_produk" class="form-label">Kode Produk</label>
    <input type="text" class="form-control @error('kode_produk') is-invalid @enderror" id="kode_produk"
        name="kode_produk" value="{{ old('kode_produk', $product->kode_produk ?? '') }}">

    @error('kode_produk')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="nama_produk" class="form-label">Nama Produk</label>
    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk"
        name="nama_produk" value="{{ old('nama_produk', $product->nama_produk ?? '') }}">

    @error('nama_produk')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="satuan" class="form-label">Satuan</label>
    <input type="text" class="form-control @error('satuan') is-invalid @enderror" id="satuan" name="satuan"
        value="{{ old('satuan', $product->satuan ?? '') }}">

    @error('satuan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="stok" class="form-label">Stok</label>
    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok"
        min="0" value="{{ old('stok', $product->stok ?? 0) }}">

    @error('stok')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="harga" class="form-label">Harga Satuan</label>
    <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
        min="0" value="{{ old('harga', $product->harga ?? 0) }}">

    @error('harga')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">
    Simpan
</button>

<a href="{{ route('products.index') }}" class="btn btn-secondary">
    Kembali
</a>
