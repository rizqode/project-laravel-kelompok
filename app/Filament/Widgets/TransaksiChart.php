<?php

namespace App\Filament\Widgets;

use App\Models\Transaksi;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TransaksiChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        $data = Transaksi::selectRaw('DATE(created_at) as tanggal, COUNT(*) as total')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal')
            ->get();

        $labels = $data->pluck('tanggal')->map(fn($tgl) => Carbon::parse($tgl)->format('d M'));
        $totals = $data->pluck('total');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Transaksi Bulan Ini',
                    'data' => $totals,
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
