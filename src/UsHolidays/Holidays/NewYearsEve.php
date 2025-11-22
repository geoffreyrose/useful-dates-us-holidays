<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class NewYearsEve extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "New Year's Eve";
        $this->additional_search_names = ["NEW YEAR'S EVE", 'NEW YEARS EVE'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '0001-12-31 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-12-31 00:00:00");
    }
}
