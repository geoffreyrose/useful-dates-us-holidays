<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class Kwanzaa extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Kwanzaa';
        $this->additional_search_names = ['KWANZAA'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '1966-12-26');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-12-26");
    }
}
