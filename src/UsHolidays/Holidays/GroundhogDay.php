<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class GroundhogDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Groundhog Day';
        $this->additional_search_names = ['GROUNDHOG DAY', 'GROUNDHOGS DAY'];
        $this->start_date = Carbon::create(1887, 2, 2, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::create($this->currentDate->year, 2, 2, 0, 0, 0);
    }
}
