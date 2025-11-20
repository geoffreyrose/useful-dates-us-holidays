<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class MemorialDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Memorial Day';
        $this->additional_search_names = ['MEMORIAL DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '1868-05-01');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1971;
        $this->federal_holiday_start_year = 1971;
    }

    public function date(): Carbon
    {
        // Last Monday in May
        $date = Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-05-01");
        for ($i = 0; $i < 7; $i++) {
            if ($date->month === 5) {
                $date->next(CarbonInterface::MONDAY);
            } else {
                $date->subDays(7);
                break;
            }
        }

        return $date;
    }
}
