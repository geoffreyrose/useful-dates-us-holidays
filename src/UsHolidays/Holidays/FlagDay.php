<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class FlagDay extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Flag Day';
        $this->additional_search_names = ['FLAG DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1916-06-14 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): ?Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-06-14 00:00:00");
    }
}
