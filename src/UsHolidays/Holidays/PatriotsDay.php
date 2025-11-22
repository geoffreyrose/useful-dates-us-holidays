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
        $this->start_date = Carbon::createFromFormat( 'Y-m-d H:i:s', '2002-09-11 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat( 'Y-m-d H:i:s', "{$this->currentDate->year}-09-11 00:00:00");
    }
}
