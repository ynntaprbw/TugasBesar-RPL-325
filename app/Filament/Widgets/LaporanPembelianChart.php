<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Pembelian;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\Log;

class LaporanPembelianChart extends ChartWidget
{
    protected static ?string $heading = 'Trend Pembelian ';

    protected function getData(): array
    {
        $pembelianData = Trend::model(Pembelian::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        // Log the data to debug
        Log::info('Pembelian Data:', $pembelianData->toArray());

        return [
            'datasets' => [
                [
                    'label' => 'Pembelian',
                    'data' => $pembelianData->map(fn (TrendValue $value) => $value->aggregate)->toArray(),
                ],
            ],
            'labels' => $pembelianData->map(fn (TrendValue $value) => $value->date)->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
