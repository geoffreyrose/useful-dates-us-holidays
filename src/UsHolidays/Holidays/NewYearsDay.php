<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class NewYearsDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "New Year's Day";
        $this->additional_search_names = ["NEW YEAR'S DAY", 'NEW YEARS DAY', 'NEW YEARS'];
        $this->start_date = Carbon::create(1, 1, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1885;
        $this->federal_holiday_start_year = 1885;
    }

    public function date(): Carbon
    {
        return Carbon::create($this->currentDate->year, 1, 1, 0, 0, 0);
    }
}
