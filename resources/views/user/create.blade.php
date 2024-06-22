<x-layout>
    <form action="{{ route('user.store') }}" method="POST">
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
        <input type="text" name="name" placeholder="name" class="@error('name') is-invalid @enderror">
        <input type="text" name="email" placeholder="email"class="@error('email') is-invalid @enderror" >
        <input type="password" name="password" placeholder="password" class="@error('password') is-invalid @enderror">
        <select name="level">
            <option value="" disabled selected>Level Akses</option>
            <option value="1">Super User</option>
            <option value="2">Kepala Unit Inventory</option>
            <option value="3">Pengendali Gudang</option>
        </select>
        <br>
        <button type="submit">Tambah</button>
    </form>
</x-layout>
