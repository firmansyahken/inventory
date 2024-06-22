<x-layout title="Daftar Gudang">
    <div class="row">
        <div class="col">
            <a href="/warehouse/create" class="btn btn-primary">Tambah</a>
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
        <table class="table table-bordered" id="myTable">
            <thead>
                <th>Nama Gudang</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>

                @foreach ($warehouses as $warehouse)
                    <tr>
                        <td>{{$warehouse->name}}</td>
                        <td>{{$warehouse->location}}</td>
                        <td>{{$warehouse->status == 1 ? "Aktif" : "Nonaktif"}}</td>
                        <td>
                            <div class="d-flex">
                                <div class="mr-2">
                                    <a href="/item/{{ $warehouse->id }}/edit" class="btn btn-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <form action="/warehouse/{{ $warehouse->id }}" method="post">
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