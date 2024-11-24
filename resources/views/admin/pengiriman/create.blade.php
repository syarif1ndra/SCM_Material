<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Pengiriman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-0">Add Pengiriman</h1>
                    <p>
                        <a href="{{ route('admin.pengiriman') }}" class="btn btn-primary">
                            back
                        </a>
                    </p>

                    <hr>

                    <!-- Form Pengiriman -->
                    <form action="{{ route('admin.pengiriman.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="material_id" class="block text-gray-700">Material ID</label>
                            <input type="text" id="material_id" name="material_id" class="w-full p-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_kirim" class="block text-gray-700">Tanggal Kirim</label>
                            <input type="date" id="tanggal_kirim" name="tanggal_kirim" class="w-full p-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_selesai" class="block text-gray-700">Tanggal Selesai</label>
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="w-full p-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label for="estimasi" class="block text-gray-700">Estimasi</label>
                            <input type="text" id="estimasi" name="estimasi" class="w-full p-2 border rounded" required>
                        </div>

                        <div class="mb-4">
                            <label for="status_pengiriman" class="block text-gray-700">Status Pengiriman</label>
                            <select id="status_pengiriman" name="status_pengiriman" class="w-full p-2 border rounded" required>
                                <option value="proses">Proses</option>
                                <option value="dikirim">Dikirim</option>
                                <option value="diterima">Diterima</option>
                                <option value="batal">Batal</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="order_id" class="block text-gray-700">Order ID</label>
                            <input type="text" id="order_id" name="order_id" class="w-full p-2 border rounded" required>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary mt-4">Simpan Pengiriman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
