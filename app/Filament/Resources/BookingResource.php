<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Booking';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('customer_name')->required()->label('Nama')->prefixIcon('heroicon-o-user-circle'),
                        TextInput::make('phone_number')->required()->label('Nomor Telepon')->numeric()->prefixIcon('heroicon-o-phone'),
                        DatePicker::make('booking_date')->required()->label('Tanggal Booking')->default(now())->prefixIcon('heroicon-o-calendar'),
                        Select::make('package_id')->relationship('package', 'name')->required()->label('Paket')->prefixIcon('heroicon-o-tag'),
                        Select::make('status')->options([
                            'pending' => 'Pending',
                            'selesai' => 'Selesai',
                            'batal' => 'Batal',
                        ])->required()->label('Status')->prefixIcon('heroicon-o-check-circle'),
                        Select::make('payment_status')->options([
                            'belum_lunas' => 'Belum Lunas',
                            'dp' => 'DP',
                            'lunas' => 'Lunas',
                        ])->required()->label('Status Pembayaran')->prefixIcon('heroicon-o-banknotes'),

                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')->label('Nama')->searchable()->sortable(),
                TextColumn::make('phone_number')->label('Nomor Telepon')->searchable()->sortable(),
                TextColumn::make('booking_date')->label('Tanggal Booking')->searchable()->sortable(),
                TextColumn::make('package.name')->label('Paket')->searchable()->sortable(),
                TextColumn::make('status')->label('Status')->searchable()->sortable()
                    ->formatStateUsing(function (string $state): string {
                        return match ($state) {
                            'pending' => 'PEending',
                            'selesai' => 'Selesai',
                            'batal' => 'Batal',
                            default => $state,
                        };
                    }),
                TextColumn::make('payment_status')->label('Status Pembayaran')->searchable()->sortable()
                    ->formatStateUsing(function (string $state): string {
                        return match ($state) {
                            'belum_lunas' => 'Belum Lunas',
                            'dp' => 'DP',
                            'lunas' => 'Lunas',
                            default => $state,
                        };
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
