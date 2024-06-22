<x-layout title="Tambah Barang Keluar">
    <h4>Barang Keluar</h4>
    <div class="mt-5">
        <form action="/checkout/{{$inventory->id}}" method="post">
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
                        <label>Barang</label>
                        <input type="text" value="{{ $inventory->item->name }}" disabled class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label>Gudang</label>
                        <input type="text" value="{{ $inventory->warehouse->name }}" disabled class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" value="{{ old('date') }}" name="date" class="form-control @error('date') is-invalid  @enderror">
                        @error('date')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label>Kuantitas</label>
                        <input type="number" value="{{ old('qty') }}" name="qty" class="form-control @error('qty') is-invalid  @enderror">
                        @error('qty')
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