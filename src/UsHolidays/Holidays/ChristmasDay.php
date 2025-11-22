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
        $this->start_date = Carbon::createFromFormat( 'Y-m-d H:i:s', '0336-12-25 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1870;
        $this->federal_holiday_start_year = 1870;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat( 'Y-m-d H:i:s', "{$this->currentDate->year}-12-25 00:00:00");
    }
}
