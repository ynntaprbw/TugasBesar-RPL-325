<?php

namespace App\Filament\Widgets;

use App\Models\Pembelian;
use App\Models\Peminjaman;
use App\Models\Sumbangan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Contracts\View\View;

class Laporan extends BaseWidget
{
    protected function getStats(): array
    {
        // Trend data for Pembelian
        $pembelianData = Trend::model(Pembelian::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        // Trend data for Peminjaman
        $peminjamanData = Trend::model(Peminjaman::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        // Return stats
        return [
            Stat::make('Pembelian', Pembelian::query()->count())
                ->description('Jumlah Pembelian')
                ->chart($pembelianData->map(fn (TrendValue $value) => $value->aggregate)->toArray())
                ->color('success'),
            Stat::make('Peminjaman', Peminjaman::query()->count())
                ->description('Jumlah Peminjaman')
                ->chart($peminjamanData->map(fn (TrendValue $value) => $value->aggregate)->toArray())
                ->color('success'),
            stat::make('Sumbangan', Sumbangan::query()->count())
                ->description('Jumlah Sumbangan')
            
        ];
    }



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
}
