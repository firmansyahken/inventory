<x-layout title="Edit Kategori Barang">
    <div class="card card-light p-4">
        <h4>Edit Kategori Barang</h4>
        <form class="mt-5" action="/supplier/{{ $supplier->id }}" method="post">
            @CSRF
            @METHOD('PUT')

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
                        <label>Nama Supplier</label>
                        <input type="text" value="{{ $supplier->name }}" name="name" class="form-control @error('name') is-invalid  @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label>Contact</label>
                        <input type="text" value="{{ old('contact') }}" name="contact" class="form-control @error('contact') is-invalid  @enderror">
                        @error('contact')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label>Alamat Supplier</label>
                <textarea type="text" value="{{ old('address') }}" name="address" class="form-control @error('address') is-invalid  @enderror">{{ $supplier->address }}</textarea>
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>