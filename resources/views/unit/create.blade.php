<x-layout title="Tambah Kategori Barang">
    <div class="col-sm-6 card card-light p-4">
        <h4>Tambah Kategori</h4>
        <form class="mt-5" action="/unit" method="post">
            @CSRF
            @METHOD('POST')

            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif

            @if (session()->has('fail'))
            <div class="alert alert-danger">
                {{ session()->get('fail') }}
            </div>
            @endif

            <div class="mb-3">
                <label>Nama Satuan</label>
                <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid  @enderror">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>