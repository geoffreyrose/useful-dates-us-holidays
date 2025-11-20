<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class ChristmasDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Christmas Day';
        $this->additional_search_names = ['CHRISTMAS DAY', 'CHRISTMAS'];
        $this->start_date = Carbon::create(336, 12, 25, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1870;
        $this->federal_holiday_start_year = 1870;
    }

    public function date(): Carbon
    {
        return Carbon::create($this->currentDate->year, 12, 25, 0, 0, 0);
    }
}
