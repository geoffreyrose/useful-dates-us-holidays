<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class ColumbusDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Columbus Day';
        $this->additional_search_names = ['COLUMBUS DAY'];
        $this->start_date = Carbon::create(1792, 10, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1968;
        $this->federal_holiday_start_year = 1968;
    }

    public function date(): Carbon
    {
        // Second Monday in October
        $date = Carbon::create($this->currentDate->year, 10, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::MONDAY) {
            $date->next(CarbonInterface::MONDAY);
        }
        $date->next(CarbonInterface::MONDAY);

        return $date;
    }
}
