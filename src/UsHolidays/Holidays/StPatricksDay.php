<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class StPatricksDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "St. Patrick's Day";
        $this->additional_search_names = [
            "ST. PATRICK'S DAY",
            'ST PATRICKS DAY',
            'ST. PATRICKS DAY',
            'SAINT PATRICKS DAY',
        ];
        $this->start_date = Carbon::create(1631, 3, 17, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::create($this->currentDate->year, 3, 17, 0, 0, 0);
    }
}
