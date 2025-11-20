<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class ValentinesDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "Valentine's Day";
        $this->additional_search_names = [
            "VALENTINE'S DAY",
            'VALENTINES DAY',
            'VALENTINES',
        ];
        $this->start_date = Carbon::create(496, 2, 14, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::create($this->currentDate->year, 2, 14, 0, 0, 0);
    }
}
