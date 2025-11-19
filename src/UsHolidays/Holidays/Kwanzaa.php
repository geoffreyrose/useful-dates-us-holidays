<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class Kwanzaa extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Kwanzaa';
        $this->additional_search_names = ['KWANZAA'];
        $this->start_date = Carbon::create(1966, 12, 26, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::create($this->currentDate->year, 12, 26, 0, 0, 0);
    }
}
