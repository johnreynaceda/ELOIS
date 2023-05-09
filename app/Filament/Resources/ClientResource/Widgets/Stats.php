<?php

namespace App\Filament\Resources\ClientResource\Widgets;

use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class Stats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('TOTAL LAWYER', \App\Models\Lawyer::count()),
            Card::make(
                'TOTAL STAFF',
                \App\Models\User::where('role_id', 2)->count()
            ),
            Card::make(
                'TOTAL SECRETARY',
                \App\Models\User::where('role_id', 1)->count()
            ),
        ];
    }
}
