<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class Thanksgiving extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Thanksgiving';
        $this->additional_search_names = ['THANKSGIVING'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '1621-11-01');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1789;
        $this->federal_holiday_start_year = 1789;
    }

    public function date(): Carbon
    {
        $date = Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-11-01");
        if ($date->dayOfWeek !== CarbonInterface::THURSDAY) {
            $date->next(CarbonInterface::THURSDAY);
        }
        // Advance to the 4th Thursday of November
        $date->next(CarbonInterface::THURSDAY)->next(CarbonInterface::THURSDAY)->next(CarbonInterface::THURSDAY);

        return $date;
    }
}
