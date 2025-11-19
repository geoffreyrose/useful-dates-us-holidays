<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class ArmedForcesDay extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Armed Forces Day';
        $this->additional_search_names = ['ARMED FORCES DAY'];
        $this->start_date = Carbon::create(1949, 5, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $date = Carbon::create($this->currentDate->year, 5, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::SATURDAY) {
            $date->next(CarbonInterface::SATURDAY);
        }
        $date->next(CarbonInterface::SATURDAY)->next(CarbonInterface::SATURDAY);

        return $date;
    }
}
