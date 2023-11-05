<?php
declare(strict_types=1);

namespace App\Enums;

use Illuminate\Support\Facades\App;

enum Days: int
{
    case Monday = 1;
    case Tuesday = 2;
    case Wednesday = 3;
    case Thursday = 4;
    case Friday = 5;
    case Saturday = 6;
    case Sunday = 7;

    const DAYS = [
        1 => 'Понеділок',
        2 => 'Вівторок',
        3 => 'Середа',
        4 => 'Четвер',
        5 => 'П\'ятниця',
        6 => 'Субота',
        7 => 'Неділя',
    ];

    public function getName(): string
    {
        $localName = App::currentLocale() === 'uk' ? 'name_uk' : 'name_en';
        return self::DAYS[$this->value][$localName];
    }
}
