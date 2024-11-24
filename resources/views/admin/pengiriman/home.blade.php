<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengiriman Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <!-- Tampilkan pesan sukses jika ada -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tombol untuk menambahkan pengiriman -->
                    <p>
                        <a href="{{ route('admin.pengiriman.create') }}" class="btn btn-primary">
                            Add Pengiriman
                        </a>
                    </p>

                    <!-- Daftar Pengiriman -->
                    <h3 class="mt-4">Daftar Pengiriman</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Material ID</th>
                                <th>Tanggal Kirim</th>
                                <th>Tanggal Selesai</th>
                                <th>Estimasi</th>
                                <th>Status Pengiriman</th>
                                <th>Order ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengiriman as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->material_id }}</td>
                                    <td>{{ $item->tanggal_kirim }}</td>
                                    <td>{{ $item->tanggal_selesai }}</td>
                                    <td>{{ $item->estimasi }}</td>
                                    <td>{{ $item->status_pengiriman }}</td>
                                    <td>{{ $item->order_id }}</td>
                                    <td>
                                        <!-- Aksi Edit dan Hapus -->
                                        <a href="{{ route('admin.pengiriman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.pengiriman.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
