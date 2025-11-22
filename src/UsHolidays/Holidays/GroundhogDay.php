<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class GroundhogDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Groundhog Day';
        $this->additional_search_names = ['GROUNDHOG DAY', 'GROUNDHOGS DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1887-02-02 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-02-02 00:00:00");
    }
}
