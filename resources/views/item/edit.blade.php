<x-layout title="Edit Barang">
    <div class="card card-light p-4">
        <h4>Edit Barang</h4>
        <form class="mt-5" action="/item/{{ $item->id }}" method="post">
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
                <div class="col-12">
                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" value="{{ $item->name }}" name="name" class="form-control @error('name') is-invalid  @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label>Jenis Barang</label>
                        <select type="text" value="{{ $item->category_id }}" name="category_id" class="form-control @error('category_id') is-invalid  @enderror">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label>Supplier Barang</label>
                        <select type="text" value="{{ $item->supplier_id }}" name="supplier_id" class="form-control @error('supplier_id') is-invalid  @enderror">
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label>Satuan Barang</label>
                        <select type="text" value="{{ $item->unit_id }}" name="unit_id" class="form-control @error('unit_id') is-invalid  @enderror">
                            @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                        @error('unit_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label>Deskripsi Barang</label>
                <textarea value="{{ $item->description }}" name="description" class="form-control @error('description') is-invalid  @enderror">{{ $item->description }}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>