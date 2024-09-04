<?php

namespace Modules\Realestate\Filament;

use Coolsam\Modules\Concerns\ModuleFilamentPlugin;
use Filament\Contracts\Plugin;
use Filament\Panel;

class RealestatePlugin implements Plugin
{
    use ModuleFilamentPlugin;

    public function getModuleName(): string
    {
        return 'Realestate';
    }

    public function getId(): string
    {
        return 'realestate';
    }

    public function boot(Panel $panel): void
    {
        // TODO: Implement boot() method.
    }
}
