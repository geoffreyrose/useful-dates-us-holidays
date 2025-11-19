<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class DaylightSavingStart extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Daylight Saving (Start)';
        $this->additional_search_names = [
            'DAYLIGHT SAVING (START)',
            'DAYLIGHT SAVING START',
            'DAYLIGHT SAVINGS (START)',
            'DAYLIGHT SAVINGS START',
        ];
        $this->start_date = Carbon::create(1918, 3, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $date = Carbon::create($this->currentDate->year, 3, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::SUNDAY);
        }
        // Move to the following Sunday -> second Sunday in March
        $date->next(CarbonInterface::SUNDAY);

        return $date;
    }
}
