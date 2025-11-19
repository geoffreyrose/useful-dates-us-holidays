<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class YomKippur extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Yom Kippur';
        $this->additional_search_names = ['YOM KIPPUR'];
        // Historical start year is negative; Carbon does not support BCE years, use a neutral placeholder
        $this->start_date = Carbon::create(1, 1, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $greg = jdtogregorian(jewishtojd(1, 10, 3761 + $this->currentDate->year));

        return Carbon::createFromFormat('m/d/Y', $greg)->startOfDay();
    }
}
