<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class ArmedForcesDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Armed Forces Day';
        $this->additional_search_names = ['ARMED FORCES DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '1949-05-01');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $date = Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-05-01");
        if ($date->dayOfWeek !== CarbonInterface::SATURDAY) {
            $date->next(CarbonInterface::SATURDAY);
        }
        $date->next(CarbonInterface::SATURDAY)->next(CarbonInterface::SATURDAY);

        return $date;
    }
}
