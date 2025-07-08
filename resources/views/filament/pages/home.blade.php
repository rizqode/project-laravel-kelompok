@php

    use App\Models\Transaksi;
    use Illuminate\Support\Carbon;

    $totalPendapatanHariIni = Transaksi::whereDate('created_at', Carbon::today())
        ->with('paket') // eager loading biar efisien
        ->get()
        ->sum(function ($transaksi) {
            return $transaksi->paket->harga ?? 0;
        });

@endphp

<x-filament-panels::page>
    <div class="text-2xl mb-4">Selamat Datang <span class="font-semibold underline">{{ auth()->user()->name }}</span>
        di
        Dashboard</div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-filament::card>
            <div class="text-lg">Total Transaksi</div>
            <div class="text-3xl font-bold">{{ \App\Models\Transaksi::count() }}</div>
        </x-filament::card>

        <x-filament::card>
            <div class="text-lg">Total Paket</div>
            <div class="text-3xl font-bold">{{ \App\Models\Paket::count() }}</div>
        </x-filament::card>

        @livewire(\App\Filament\Widgets\TransaksiChart::class)

        <x-filament::card>
            <div class="text-center py-4">
                <h2 class="text-lg font-bold">Pendapatan Hari Ini</h2>
                <p class="text-2xl font-semibold text-green-600">
                    Rp{{ number_format($totalPendapatanHariIni, 0, ',', '.') }}
                </p>
            </div>
        </x-filament::card>

    </div>
</x-filament-panels::page>
