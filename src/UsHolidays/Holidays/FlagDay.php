<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class FlagDay extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Flag Day';
        $this->additional_search_names = ['FLAG DAY'];
        $this->start_date = Carbon::create(1916, 6, 14, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::create($this->currentDate->year, 6, 14, 0, 0, 0);
    }
}
