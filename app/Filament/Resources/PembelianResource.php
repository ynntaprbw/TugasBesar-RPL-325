<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembelianResource\Pages;
use App\Filament\Resources\PembelianResource\RelationManagers;
use App\Models\Pembelian;
use DateTime;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembelianResource extends Resource
{
    protected static ?string $model = Pembelian::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('idPembelian')->label('ID Pembeli'),
                TextInput::make('idBuku')->label('ID Buku'),
                DateTimePicker::make('tanggalPembayaran')->label("Tanggal Pembayaran"),
                TextInput::make('diskon')->label('Diskons'),
                TextInput::make('total_bayar')->label('Total Bayar'),
                TextInput::make('metodePembayaran')->label('Metode Pembayaran'),
                TextInput::make('statusPembayaran')->label('Status Pembayaran')
                        
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Textcolumn::make('idPembelian')->label('ID Pembelian'),
                textcolumn::make('idBuku')->label('ID Buku'),
                TextColumn::make('tanggalPembayaran')->label("Tanggal Pembayaran"),
                TextColumn::make('diskon')->label('Diskon'),
                TextColumn::make('total_bayar')->label('Total Bayar'),
                TextColumn::make('metodePembayaran')->label('Metode Pembayaran'),
                TextColumn::make('statusPembayaran')->label('Status Pembayaran'),
                
            ])
            ->filters([
                //
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
            'index' => Pages\ListPembelians::route('/'),
            'create' => Pages\CreatePembelian::route('/create'),
            'edit' => Pages\EditPembelian::route('/{record}/edit'),
        ];
    }
}
