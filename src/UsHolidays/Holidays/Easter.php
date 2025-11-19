<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class Easter extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Easter';
        $this->additional_search_names = ['EASTER'];
        $this->start_date = Carbon::create(300, 3, 21, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        // Based on PHP's built-in easter_days() from March 21
        $date = Carbon::create($this->currentDate->year, 3, 21, 0, 0, 0);
        $days = \easter_days($this->currentDate->year);

        return $date->addDays($days);
    }
}
