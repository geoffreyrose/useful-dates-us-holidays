<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class PresidentsDay extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "Presidents' Day";
        $this->additional_search_names = ["PRESIDENTS' DAY", 'PRESIDENTS DAY'];
        $this->start_date = Carbon::create(1971, 2, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1971;
        $this->federal_holiday_start_year = 1971;
    }

    public function date(): Carbon
    {
        // Third Monday in February
        $date = Carbon::create($this->currentDate->year, 2, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::MONDAY) {
            $date->next(CarbonInterface::MONDAY);
        }
        $date->next(CarbonInterface::MONDAY)->next(CarbonInterface::MONDAY);

        return $date;
    }
}
