<?php

namespace App\Filament\Resources\TimetableResource\Pages;

use App\Filament\Resources\TimetableResource;
use App\Services\GenerateTimetablesService;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTimetables extends ListRecords
{
    protected static string $resource = TimetableResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('generate')
                ->label('Згенерувати')
                ->action(function () {
                    /* @var GenerateTimetablesService $service */
                    $service = app(GenerateTimetablesService::class);
                    $service->run();
                })
        ];
    }
}
