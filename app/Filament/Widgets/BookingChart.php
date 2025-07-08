<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;

class BookingChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = Booking::join('packages', 'bookings.package_id', '=', 'packages.id')
            ->selectRaw('packages.name as package_name, COUNT(*) as total')
            ->groupBy('packages.name')
            ->orderBy('total', 'desc')
            ->pluck('total', 'package_name');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Booking per Paket',
                    'data' => $data->values(),
                ],
            ],
            'labels' => $data->keys(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
