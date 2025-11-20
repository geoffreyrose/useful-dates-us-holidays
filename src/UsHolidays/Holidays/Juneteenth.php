<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class Juneteenth extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Juneteenth';
        $this->additional_search_names = ['JUNETEENTH'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '1866-06-19');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 2021;
        $this->federal_holiday_start_year = 2021;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-06-19");
    }
}
