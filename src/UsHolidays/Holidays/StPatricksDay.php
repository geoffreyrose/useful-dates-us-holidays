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
        $this->start_date = Carbon::createFromFormat('Y-m-d', '1631-03-17');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-03-17");
    }
}
