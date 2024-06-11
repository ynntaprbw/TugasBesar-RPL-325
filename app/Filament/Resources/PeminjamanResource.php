<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Denda;
use Filament\Forms\Form;
use App\Models\Peminjaman;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Actions\DeleteBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PeminjamanResource\Pages;
use App\Filament\Resources\PeminjamanResource\RelationManagers;
use App\Filament\Resources\PeminjamanResource\Pages\EditPeminjaman;
use App\Filament\Resources\PeminjamanResource\Pages\ListPeminjamen;
use App\Filament\Resources\PeminjamanResource\Pages\CreatePeminjaman;

class PeminjamanResource extends Resource
{
    protected static ?string $model = Peminjaman::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')->label('ID User'),
                TextInput::make('idBuku')->label('ID Buku'),
                DateTimePicker::make('tanggalPeminjaman')->label('Tanggal Peminjaman'),
                TextInput::make('durasiPeminjaman')->numeric()->label('Durasi Peminjaman'),
                DateTimePicker::make('batasPengembalian')->label('Batas Pengembalian'),
                DateTimePicker::make('tanggalPengembalian')->label('Tanggal Pengembalian'),
                TextInput::make('statusPeminjaman')->label('Status Peminjaman'),  
                TextInput::make('statusPengambilan')->label('Status Pengambilan')
                    
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('idPeminjaman')->label('ID Peminjaman'),
                TextColumn::make('id')->label('ID User'),
                TextColumn::make('idBuku')->label('ID Buku'),
                TextColumn::make('statusPeminjaman')->label('Status Peminjaman'),
                TextColumn::make('tanggalPeminjaman')->label('Tanggal Peminjaman'),
                TextColumn::make('durasiPeminjaman')->label('Durasi Peminjaman'),
                TextColumn::make('batasPengembalian')->label('Batas Pengembalian'),
                TextColumn::make('tanggalPengembalian')->label('Tanggal Pengembalian'),
                TextColumn::make('statusPengambilan')->label('Status Pengambilan'),
                // Action::make('action')->label('Actions'),
            ])
            ->filters([
                // Tentukan filter-filter yang ingin Anda terapkan pada tabel
                SelectFilter::make('statusPeminjaman')->options([
                    'Telat' => 'Telat',
                    'Tepat Waktu' => 'Tepat Waktu',
                ])->label('Status'),
            ])
            ->actions([
                EditAction::make(),
                // Action::make('buatDenda')->label('Buat Denda')->visible(fn ($peminjaman) => $peminjaman->statusPeminjaman === 'Telat'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                DeleteBulkAction::make(),
                ]),
            ]);
    }

    // public function buatDenda($peminjamanId)
    // {
    //     $peminjaman = Peminjaman::findOrFail($peminjamanId);

    //     if ($peminjaman->statusPeminjaman === 'Telat') {
    //         $batasPengembalian = Carbon::parse($peminjaman->batasPengembalian);
    //         $tanggalPengembalian = Carbon::parse($peminjaman->tanggalPengembalian);

    //         // Hitung selisih hari
    //         $selisihHari = $tanggalPengembalian->diffInDays($batasPengembalian);

    //         // Tentukan tarif denda per hari
    //         $tarifDendaPerHari = 2000;

    //         // Hitung jumlah denda
    //         $jumlahDenda = $selisihHari * $tarifDendaPerHari;

    //         // Buat entri denda baru
    //         $denda = new Denda();
    //         $denda->idPeminjaman = $peminjaman->idPeminjaman;
    //         $denda->id = $peminjaman->id;
    //         $denda->totalDenda = $jumlahDenda;
    //         $denda->save();

    //         // Kemudian, Anda bisa menambahkan logika lainnya, seperti mengirim email pemberitahuan atau menampilkan pesan sukses
    //     }

    //     // Redirect kembali ke halaman peminjaman atau melakukan tindakan lainnya
    //     return redirect()->back()->with('success', 'Denda berhasil dibuat.');
    // }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPeminjamen::route('/'),
            'create' => Pages\CreatePeminjaman::route('/create'),
            'edit' => Pages\EditPeminjaman::route('/{record}/edit'),
        ];
    }
}
