<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class CincoDeMayo extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Cinco de Mayo';
        $this->additional_search_names = ['CINCO DE MAYO'];
        $this->start_date = Carbon::create(1862, 5, 5, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::create($this->currentDate->year, 5, 5, 0, 0, 0);
    }
}
