<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class Easter extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Easter';
        $this->additional_search_names = ['EASTER'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '0300-03-21');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        // Based on PHP's built-in easter_days() from March 21
        $date = Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-03-21");
        $days = \easter_days($this->currentDate->year);

        return $date->addDays($days);
    }
}
