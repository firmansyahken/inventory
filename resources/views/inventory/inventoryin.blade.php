<x-layout title="Daftar Barang Masuk">
    @can('pengendali-gudang')
        <div class="row">
            <div class="col">
                <a href="/checkin/create" class="btn btn-primary">Tambah</a>
            </div>
        </div>
    @endcan

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

    <div class="table-container mt-4">
        <table class="table table-bordered">
            <thead>
                <th>Barang</th>
                <th>Satuan</th>
                <th>Qty</th>
                <th>Gudang</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </thead>
            <tbody>

                @foreach ($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->item->name }}</td>
                        <td>{{ $inventory->item->unit->name }}</td>
                        <td>{{ $inventory->qty }}</td>
                        <td>{{ $inventory->warehouse->name }}</td>
                        <td>{{ $inventory->date }}</td>
                        <td>
                            <div class="d-flex">
                                <div class="mr-2">
                                    <a href="/inventory/{{ $inventory->id }}/edit" class="btn btn-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                                <a href="/checkout/{{ $inventory->id }}" class="btn btn-primary">
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-layout>
