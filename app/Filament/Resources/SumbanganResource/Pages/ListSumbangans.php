<?php

namespace App\Filament\Resources\SumbanganResource\Pages;

use App\Filament\Resources\SumbanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSumbangans extends ListRecords
{
    protected static string $resource = SumbanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
