<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static string $view = 'filament.pages.settings';

    public $site_name;
    public $logo;

    public function mount()
    {
        $settings = Setting::firstOrCreate([]);
        $this->site_name = $settings->site_name;
        $this->logo = $settings->logo_path;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('site_name')
                ->required()
                ->maxLength(255),
            Forms\Components\FileUpload::make('logo')
                ->image()
                ->directory('logos'),
        ];
    }

    public function submit()
    {
        $settings = Setting::firstOrCreate([]);
        $settings->update([
            'site_name' => $this->site_name,
            'logo_path' => $this->logo,
        ]);

        $this->notify('success', 'Settings updated successfully.');
    }
}