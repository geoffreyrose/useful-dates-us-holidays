<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class PearlHarborRemembrance extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Pearl Harbor Remembrance Day';
        $this->additional_search_names = ['PEARL HARBOR REMEMBRANCE DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1994-12-07 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-12-07 00:00:00");
    }
}
