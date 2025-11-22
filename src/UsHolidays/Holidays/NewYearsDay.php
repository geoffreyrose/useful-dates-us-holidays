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
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '0001-01-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1885;
        $this->federal_holiday_start_year = 1885;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-01-01 00:00:00");
    }
}
