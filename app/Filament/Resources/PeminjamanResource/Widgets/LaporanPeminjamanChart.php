<?php

namespace App\Filament\Resources\PeminjamanResource\Widgets;

use Filament\Widgets\ChartWidget;

class LaporanPeminjamanChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
