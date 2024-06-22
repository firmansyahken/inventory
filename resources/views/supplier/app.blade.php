<x-layout title="Daftar Supplier Barang">
    <div class="row">
        <div class="col">
            <a href="/supplier/create" class="btn btn-primary">Tambah</a>
        </div>
    </div>
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
    <ul class="list-group mt-4">
        <div class="row">
            @foreach ($suppliers as $supplier)
            <div class="col-md-6">
                <li class="list-group-item d-flex items-center justify-content-between">
                    <div>
                        <p>{{ $supplier->name }}</p>
                        <p>{{ $supplier->address }}</p>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="/supplier/{{ $supplier->id }}/edit" class="badge badge-success">Edit</a>
                        </div>
                        <form action="/supplier/{{ $supplier->id }}" method="post">
                            @CSRF
                            @METHOD("DELETE")
                            <button type="submit" onclick="return confirm('Yakin untuk dihapus ?')" class="badge badge-danger border-0">Delete</button>
                        </form>
                    </div>
                </li>
            </div>
            @endforeach
        </div>
    </ul>
</x-layout>