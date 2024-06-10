<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Denda;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\DendaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DendaResource\RelationManagers;
use Filament\Forms\Components\DatePicker;

class DendaResource extends Resource
{
    protected static ?string $model = Denda::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('idPeminjaman')->label('ID Peminjaman'),
                TextInput::make('totalDenda')->label('Total Denda'),
                DatePicker::make('tanggalBayarDenda')->label('Tanggal Bayar Denda'),
                TextInput::make('statusDenda')->label('Status Denda'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('idPeminjaman')->label('ID Peminjaman'),
                TextColumn::make('totalDenda')->label('Total Denda'),
                TextColumn::make('tanggalBayarDenda')->label('Tanggal Bayar Denda'),
                TextColumn::make('statusDenda')->label('Status Denda'),
            ])
            ->filters([
                SelectFilter::make('statusDenda')->options([
                    'Belum Lunas' => 'Belum Lunas',
                    'Tunggu Konfirmasi' => 'Tunggu Konfirmasi',
                    'Lunas' => 'Lunas',
                ])->label('Status Denda'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListDendas::route('/'),
            'create' => Pages\CreateDenda::route('/create'),
            'edit' => Pages\EditDenda::route('/{record}/edit'),
        ];
    }
}

