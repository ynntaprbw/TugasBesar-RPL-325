<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SumbanganResource\Pages;
use App\Models\Sumbangan;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SumbanganResource extends Resource
{
    protected static ?string $model = Sumbangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')->label('ID User'),
                TextInput::make('idKategori')->label('ID Kategori'),
                TextInput::make('judulBuku')->label('Judul Buku'),
                TextInput::make('bahasa')->label('Bahasa'),
                TextInput::make('status')->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('idBukuSumbangan')->label('ID Buku Sumbangan'),
                TextColumn::make('idKategori')->label('ID Buku'),
                TextColumn::make('judulBuku')->label('Judul Buku'),
                TextColumn::make('bahasa')->label('Bahasa'),
                TextColumn::make('status')->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSumbangans::route('/'),
            'create' => Pages\CreateSumbangan::route('/create'),
            'edit' => Pages\EditSumbangan::route('/{record}/edit'),
        ];
    }
}
