<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class PatriotsDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Patriot Day';
        $this->additional_search_names = ['PATRIOT DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '2002-09-11');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-09-11");
    }
}
