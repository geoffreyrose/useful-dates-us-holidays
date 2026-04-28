<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class ChristmasEve extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Christmas Eve';
        $this->additional_search_names = ['CHRISTMAS EVE'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '0336-12-24 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): ?Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-12-24 00:00:00");
    }
}
