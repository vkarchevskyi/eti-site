<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Filament\Resources\LessonResource;
use Carbon\Carbon;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLesson extends CreateRecord
{
    protected static string $resource = LessonResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['time_from'] = Carbon::make($data['time_from'])->isoFormat('H:m');
        $data['time_to'] = Carbon::make($data['time_to'])->isoFormat('H:m');

        return $data;
    }
}
