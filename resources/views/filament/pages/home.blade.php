@php
    $totalPendapatanHariIni = \App\Models\Booking::with('package')
        ->whereDate('booking_date', today())
        ->where('status', 'selesai')
        ->get()
        ->sum(fn($booking) => $booking->package->price ?? 0);

    use App\Models\Package;
    $packages = Package::all();
@endphp


<x-filament-panels::page>
    @role('admin')
        <div class="text-2xl mb-4">Selamat Datang <span class="font-semibold underline">{{ auth()->user()->name }}</span>
            di
            Dashboard</div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-filament::card>
                <div class="text-lg">Total Booking</div>
                <div class="text-3xl font-bold">{{ \App\Models\Booking::count() }}</div>
            </x-filament::card>

            <x-filament::card>
                <div class="text-lg">Total Paket</div>
                <div class="text-3xl font-bold">{{ \App\Models\Package::count() }}</div>
            </x-filament::card>

            @livewire(\App\Filament\Widgets\BookingChart::class)

            <x-filament::card>
                <div class="flex flex-col items-center justify-center h-32 text-center">
                    <div class="text-lg">Pendapatan Hari Ini</div>
                    <div class="text-3xl font-bold">
                        Rp {{ number_format($totalPendapatanHariIni, 0, ',', '.') }}
                    </div>
                </div>
            </x-filament::card>
        </div>
    @endrole

    <div class="text-2xl font-bold mb-6">Paket Studio Foto</div>

    <div class="grid grid-cols-2 gap-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach ($packages as $package)
                <div class="rounded-xl shadow border p-4">
                    <img src="{{ asset('storage/' . $package->gambar) }}" alt="{{ $package->nama }}"
                        class="w-full h-40 object-cover rounded-lg mb-3">

                    <h2 class="text-lg font-semibold">{{ $package->name }}</h2>

                    <p class="text-sm text-gray-600 mb-2">{{ $package->description }}</p>

                    <p class="font-bold text-amber-600">
                        Rp {{ number_format($package->harga, 0, ',', '.') }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</x-filament-panels::page>
