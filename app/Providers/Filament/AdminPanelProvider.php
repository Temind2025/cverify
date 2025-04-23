<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Login;
use App\Filament\Resources\CertificateResource;
use App\Filament\Resources\CourseResource;
use App\Filament\Resources\UserResource;
use App\Filament\Pages\Settings;
use Filament\Panel;
use Filament\PanelProvider;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->middleware(['ensure.user.has.permission'])
            ->resources([
                CertificateResource::class,
                CourseResource::class,
                UserResource::class,
            ])
            ->pages([
                Settings::class,
            ]);
    }
}