<x-layout>
    <div class="row">
        <div class="col">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <ul class="list-group mt-4">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-6">
                    <li class="list-group-item d-flex items-center justify-content-between">
                        <div>
                            <p>{{ $user->name }}</p>
                            <p>
                                @if ($user->level == 1)
                                    Super User
                                @elseif($user->level == 2)
                                    Kepala Unit Inventory
                                @elseif($user->level == 3)
                                    Pengendali Gudang
                                @endif
                            </p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="/user/{{ $user->id }}/edit" class="badge badge-success">Edit</a>
                            </div>
                            <form action="/user/{{ $user->id }}" method="post">
                                @CSRF
                                @METHOD('DELETE')
                                <button type="submit" onclick="return confirm('Yakin untuk dihapus ?')"
                                    class="badge badge-danger border-0">Delete</button>
                            </form>
                        </div>
                    </li>
                </div>
            @endforeach
        </div>
    </ul>
</x-layout>
