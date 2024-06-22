<x-layout title="Tambah Gudang">
    <h4>Tambah Gudang</h4>
    <div class="mt-5">
        <form action="/warehouse" method="post">
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

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label>Nama Gudang</label>
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid  @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label>Lokasi</label>
                        <input type="text" value="{{ old('location') }}" name="location" class="form-control @error('location') is-invalid  @enderror">
                        @error('location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>