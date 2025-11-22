<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class IndigenousPeoplesDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "Indigenous Peoples' Day";
        $this->additional_search_names = ["INDIGENOUS PEOPLES' DAY", 'INDIGENOUS PEOPLES DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1792-10-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1968;
        $this->federal_holiday_start_year = 1968;
    }

    public function date(): Carbon
    {
        // Same as Columbus Day: second Monday in October
        return new ColumbusDay()->setCurrentDate($this->currentDate)->date();
    }
}
