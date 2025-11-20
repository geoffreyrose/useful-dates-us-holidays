<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class GoodFriday extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Good Friday';
        $this->additional_search_names = ['GOOD FRIDAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '0033-03-21');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        // Two days before Easter
        $easter =  new Easter()->setCurrentDate($this->currentDate)->date();

        return $easter->copy()->subDays(2);
    }
}
