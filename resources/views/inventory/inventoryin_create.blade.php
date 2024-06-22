<x-layout title="Tambah Barang Masuk">
    <h4>Tambah Barang Masuk</h4>
    <div class="mt-5">
        <form action="/checkin" method="post">
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
                        <label>Gudang</label>
                        <select type="text" value="{{ old('warehouse_id') }}" name="warehouse_id" class="form-control @error('warehouse_id') is-invalid  @enderror">
                            @foreach ($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                            @endforeach
                        </select>
                        @error('warehouse_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label>Barang</label>
                        <select type="text" value="{{ old('item_id') }}" name="item_id" class="form-control @error('item_id') is-invalid  @enderror">
                            @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('item_id')
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