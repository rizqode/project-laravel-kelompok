<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Hash;


class UserSettings extends Page
{

    protected static ?string $navigationLabel = 'Pengaturan Akun';
    protected static ?string $navigationGroup = 'User';
    protected static string $view = 'filament.pages.user-settings';
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?int $navigationSort = 999;

    public array $formData = [];

    public function mount(): void
    {
        $user = auth()->user();
        $this->form->fill([
            'name' => $user->name,
            'email' => $user->email,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')->label('Nama'),
            TextInput::make('email')->label('Email')->email(),
            TextInput::make('old_password')
                ->label('Password Lama')
                ->password()
                ->dehydrateStateUsing(fn($state) => $state) // biar dikirim ke submit
                ->requiredWith('new_password'),
            TextInput::make('new_password')
                ->label('Password Baru')
                ->password()
                ->dehydrateStateUsing(fn($state) => $state)
                ->minLength(6)
                ->nullable(),
        ];
    }

    protected function getFormStatePath(): string
    {
        return 'formData'; // penting!
    }

    public function submit()
    {
        $data = $this->form->getState();
        $user = auth()->user();

        // Validasi dan update nama + email
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        // Jika user mengisi password baru
        if (!empty($data['new_password'])) {
            if (!Hash::check($data['old_password'], $user->password)) {
                $this->addError('formData.old_password', 'Password lama salah.');
                return;
            }

            $user->update([
                'password' => bcrypt($data['new_password']),
            ]);
        }

        Notification::make()
            ->title('Pengaturan berhasil disimpan.')
            ->success()
            ->send();

        $this->form->fill([
            'name' => $user->fresh()->name,
            'email' => $user->fresh()->email,
        ]);
    }
}
