<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Pengiriman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold">Daftar Pengiriman</h3>

                    @if($pengiriman->isEmpty())
                        <p>Tidak ada pengiriman yang tersedia.</p>
                    @else
                        <table class="min-w-full table-auto mt-4 border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">ID Pengiriman</th>
                                    <th class="px-4 py-2">Material ID</th>
                                    <th class="px-4 py-2">Tanggal Kirim</th>
                                    <th class="px-4 py-2">Status Pengiriman</th>
                                    <th class="px-4 py-2">Estimasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengiriman as $item)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $item->id }}</td>
                                        <td class="px-4 py-2">{{ $item->material_id }}</td>
                                        <td class="px-4 py-2">{{ $item->tanggal_kirim }}</td>
                                        <td class="px-4 py-2">{{ $item->status_pengiriman }}</td>
                                        <td class="px-4 py-2">{{ $item->estimasi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
