<?php

namespace App\Filament\Resources\AppointmentCalendarResource\Widgets;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;
use Filament\Widgets\Widget;

class CalendarWidget extends FullCalendarWidget
{
    protected static string $view = 'filament.resources.appointment-calendar-resource.widgets.calendar-widget';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Document';
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Types';

    public function getViewData(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'Breakfast!',
                'start' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Meeting with Pamela',
                'start' => now()->addDay(),
                'url' => 'https://some-url.com',
                'shouldOpenInNewTab' => true,
            ],
        ];
    }
}
