<?php

namespace App\Filament\Resources\SumbanganResource\Pages;

use App\Filament\Resources\SumbanganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSumbangan extends EditRecord
{
    protected static string $resource = SumbanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
