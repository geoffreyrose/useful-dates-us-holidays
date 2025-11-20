<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class IndependenceDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Independence Day';
        $this->additional_search_names = ['INDEPENDENCE DAY', 'FORTH OF JULY', '4TH OF JULY'];
        $this->start_date = Carbon::create(1777, 7, 4, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1941;
        $this->federal_holiday_start_year = 1941;
    }

    public function date(): Carbon
    {
        return Carbon::create($this->currentDate->year, 7, 4, 0, 0, 0);
    }
}
