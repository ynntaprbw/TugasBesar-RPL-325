<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BukuResource\Pages;
use App\Filament\Resources\BukuResource\RelationManagers;
use App\Models\Buku;
use Filament\Forms;
use Filament\Forms\Components;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use App\Filament\forms\Resources\FileUpload;
use Filament\Tables;
use App\Filament\Resources\Select;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Form;
use Filament\Tables\Columns;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('idBuku')->label('ID Buku'),
                TextInput::make('idKategori')->label('ID Kategori'),
                TextInput::make('judulBuku')
                    ->label('Judul Buku')
                    ->required(),
                TextInput::make('namaPenulis')
                    ->label('Nama Penulis')
                    ->required(),
                TextInput::make('namaPenerbit')
                    ->label('Nama Penerbit')
                    ->required(),
                TextInput::make('tahunTerbit')
                    ->label('Tahun Terbit')
                    ->required(),
                TextInput::make('harga')
                    ->label('Harga')
                    ->type('number')
                    ->required(),
               TextInput::make('stokBuku')
                    ->label('Stok Buku')
                    ->type('number')
                    ->required(),
                TextInput::make('fotosampul')->label('Foto Sampul'),
                TextInput::make('jumlahHalaman')
                    ->label('Jumlah Halaman')
                    ->type('number')
                    ->required(),
                RichEditor::make('sinopsis')
                    ->label('Sinopsis'),
                TextInput::make('ISBN')
                    ->label('ISBN')
                    ->required(),
                TextInput::make('bahasa')
                    ->label('Bahasa')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                textcolumn::make('idBuku')->label("ID Buku"),
                TextColumn::make('judulBuku')->label('Judul Buku'),
                TextColumn::make('namaPenulis')->label('Nama Penulis'),
                TextColumn::make('namaPenerbit')->label('Nama Penerbit'),
                TextColumn::make('tahunTerbit')->label('Tahun Terbit'),
                TextColumn::make('harga')->label('Harga'),
                TextColumn::make('stokBuku')->label('Stok Buku'),
                TextColumn::make('fotoSampul')->label('Foto Sampul'),
                TextColumn::make('jumlahHalaman')->label('Jumlah Halaman'),
                TextColumn::make('sinopsis')->label('Sinopsis'),
                TextColumn::make('ISBN')->label('ISBN'),
                TextColumn::make('bahasa')->label('Bahasa'),
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }
}
