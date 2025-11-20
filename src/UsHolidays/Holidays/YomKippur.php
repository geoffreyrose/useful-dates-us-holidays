<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class YomKippur extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Yom Kippur';
        $this->additional_search_names = ['YOM KIPPUR'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '0001-01-01');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $greg = jdtogregorian(jewishtojd(1, 10, 3761 + $this->currentDate->year));

        return Carbon::createFromFormat('m/d/Y', $greg)->startOfDay();
    }
}
