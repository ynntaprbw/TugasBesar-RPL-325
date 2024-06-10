<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtikelResource\Pages;
use App\Models\Artikel;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ArtikelResource extends Resource
{
    protected static ?string $model = Artikel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Main Content')->schema([
                    TextInput::make('idArtikel')->label('ID Artikel'),
                    TextInput::make('id'),
                    FileUpload::make('media')
                        ->label('Media')
                        ->disk('public')
                        ->directory('uploads/media')
                        ->visibility('public'),
                    TextInput::make('judulArtikel')->label('Judul Artikel'),
                    TextInput::make('sumberArtikel')->label('Sumber Artikel'),
                    TextInput::make('thumbnail')->label('Thumbnail'),
                    DatePicker::make('tanggalUnggah')->label('Tanggal Unggah')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('idArtikel')->label('ID Artikel'),
                TextColumn::make('id'),
                ImageColumn::make('media')
                    ->label('Media')
                    ->disk('public'),
                TextColumn::make('judulArtikel')->label('Judul Artikel'),
                TextColumn::make('sumberArtikel')->label('Sumber Artikel'),
                TextColumn::make('thumbnail')->label('Thumbnail'),
                TextColumn::make('tanggalUnggah')->label('Tanggal Unggah')
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
            'index' => Pages\ListArtikels::route('/'),
            'create' => Pages\CreateArtikel::route('/create'),
            'edit' => Pages\EditArtikel::route('/{record}/edit'),
        ];
    }
}
