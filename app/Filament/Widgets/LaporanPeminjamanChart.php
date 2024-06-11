<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Peminjaman;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\Log;

class LaporanPeminjamanChart extends ChartWidget
{
    protected static ?string $heading = 'Trend Peminjaman';

    protected function getData(): array
    {
        $peminjamanData = Trend::model(Peminjaman::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        // Log the data to debug
        Log::info('Peminjaman Data:', $peminjamanData->toArray());

        return [
            'datasets' => [
                [
                    'label' => 'Peminjaman',
                    'data' => $peminjamanData->map(fn (TrendValue $value) => $value->aggregate)->toArray(),
                ],
            ],
            'labels' => $peminjamanData->map(fn (TrendValue $value) => $value->date)->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
