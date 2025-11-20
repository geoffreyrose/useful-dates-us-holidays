<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class AprilFoolsDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "April Fools' Day";
        $this->additional_search_names = ["APRIL FOOL'S DAY", "APRIL FOOLS' DAY", 'APRIL FOOLS DAY', 'APRIL FOOLS'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '1582-04-01');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-04-01");
    }
}
