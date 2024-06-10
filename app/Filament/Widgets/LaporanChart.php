<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Pembelian;
use App\Models\Peminjaman;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\View\View;

class LaporanChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
            $pembelianData = Trend::model(Pembelian::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        $peminjamanData = Trend::model(Peminjaman::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Pembelian',
                    'data' => $pembelianData->map(fn (TrendValue $value) => $value->aggregate),
                ],
                [
                    'label' => 'Peminjaman',
                    'data' => $peminjamanData->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $peminjamanData->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
