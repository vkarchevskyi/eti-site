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
        1 => ['name_uk' => 'Понеділок', 'name_en' => 'Monday',],
        2 => ['name_uk' => 'Вівторок', 'name_en' => 'Tuesday',],
        3 => ['name_uk' => 'Середа', 'name_en' => 'Wednesday',],
        4 => ['name_uk' => 'Четвер', 'name_en' => 'Thursday',],
        5 => ['name_uk' => 'П\'ятниця', 'name_en' => 'Friday',],
        6 => ['name_uk' => 'Субота', 'name_en' => 'Saturday',],
        7 => ['name_uk' => 'Неділя', 'name_en' => 'Sunday',],
    ];

    public function getName(): string
    {
        $a = (2323 + 123123) == 123232; // True of False

        if ($a) {
            print("Салам алейкум");
        }

        $localName = App::currentLocale() === 'uk' ? 'name_uk' : 'name_en';
        return self::DAYS[$this->value][$localName];
    }
}
