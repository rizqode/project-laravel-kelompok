<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Package;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';
    protected static ?string $navigationLabel = 'Paket';

    public static function canCreate(): bool
    {
        return Auth::user()?->hasRole('admin');
    }

    // Kalau pakai Bulk delete
    public static function canDeleteAny(): bool
    {
        return Auth::user()?->hasRole('admin');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('name')->required()->label('Nama Paket')->prefixIcon('heroicon-o-tag'),
                        Select::make('category')->required()->label('Kategori')
                            ->options([
                                'Studio' => 'Studio',
                                'Outdoor' => 'Outdoor',
                                'Event' => 'Event',
                            ])->prefixIcon('heroicon-o-tag'),
                        Textarea::make('description')->required()->label('Deskripsi'),
                        TextInput::make('duration')->required()->label('Durasi (menit)')->numeric()->prefixIcon('heroicon-o-clock'),
                        TextInput::make('price')->required()->label('Harga')->numeric()->prefixIcon('heroicon-o-banknotes'),

                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Paket')->searchable()->sortable(),
                TextColumn::make('category')->label('Kategori')->searchable()->sortable(),
                TextColumn::make('description')->label('Deskripsi')->searchable()->sortable(),
                TextColumn::make('duration')->label('Durasi (menit)')->searchable()->sortable(),
                TextColumn::make('price')->label('Harga')->searchable()->sortable()->formatStateUsing(fn($state) => 'Rp ' . number_format($state, 0, ',', '.')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->visible(fn(Package $record): bool => Auth::user()->hasRole('admin')),
                Tables\Actions\EditAction::make()->visible(fn(Package $record): bool => Auth::user()->hasRole('admin')),
                Tables\Actions\DeleteAction::make()->visible(fn(Package $record): bool => Auth::user()->hasRole('admin')),
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
