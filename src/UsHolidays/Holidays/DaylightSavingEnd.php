<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class DaylightSavingEnd extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Daylight Saving (End)';
        $this->additional_search_names = [
            'DAYLIGHT SAVING (END)',
            'DAYLIGHT SAVING END',
            'DAYLIGHT SAVINGS (END)',
            'DAYLIGHT SAVINGS END',
        ];
        $this->start_date = Carbon::createFromFormat( 'Y-m-d H:i:s', '1918-11-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $date = Carbon::createFromFormat( 'Y-m-d H:i:s', "{$this->currentDate->year}-11-01 00:00:00");
        if ($date->dayOfWeek !== CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::SUNDAY);
        }

        return $date;
    }
}
