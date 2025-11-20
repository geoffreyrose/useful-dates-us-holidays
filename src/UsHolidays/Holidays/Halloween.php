<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class Halloween extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Halloween';
        $this->additional_search_names = ['HALLOWEEN'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '1745-10-31');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-10-31");
    }
}
