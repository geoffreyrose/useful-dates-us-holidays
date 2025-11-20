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
        $this->start_date = Carbon::createFromFormat('Y-m-d', '0496-02-14');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-02-14");
    }
}
