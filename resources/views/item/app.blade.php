<x-layout title="Daftar Barang">
    <div class="row">
        <div class="col">
            <a href="/item/create" class="btn btn-primary">Tambah</a>
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

    <div class="table-container mt-4 p-2">
        <table class="table display" id="myTable">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Supplier</th>
                    <th>Jenis Barang</th>
                    <th>Satuan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->supplier->name}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->unit->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <div class="d-flex">
                            <div class="mr-2">
                                <a href="/item/{{ $item->id }}/edit" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                            <form action="/item/{{ $item->id }}" method="post">
                                @CSRF
                                @METHOD("DELETE")
                                <button type="submit" onclick="return confirm('Yakin untuk dihapus ?')" class="btn btn-danger border-0">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</x-layout>