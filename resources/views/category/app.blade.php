<x-layout title="Daftar Kategori Barang">

    <div class="row">
        <div class="col">
            <a href="/category/create" class="btn btn-primary">Tambah</a>
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
            @foreach ($categories as $category)
            <div class="col-md-6">
                <li class="list-group-item d-flex items-center justify-content-between">
                    {{ $category->name }}
                    <div class="row">
                        <div class="col">
                            <a href="/category/{{ $category->id }}/edit" class="badge badge-success">Edit</a>
                        </div>
                        <form action="/category/{{ $category->id }}" method="post">
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