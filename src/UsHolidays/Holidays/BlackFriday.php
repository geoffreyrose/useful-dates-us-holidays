<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class BlackFriday extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Black Friday';
        $this->additional_search_names = ['BLACK FRIDAY', 'DAY AFTER THANKSGIVING'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1951-11-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $date = new Thanksgiving()->setCurrentDate($this->currentDate)->date();

        return $date->addDay();
    }
}
