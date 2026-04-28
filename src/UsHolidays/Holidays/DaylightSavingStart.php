<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\Constants\UnitValue;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class DaylightSavingStart extends HolidayUsefulDateAbstract
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
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1918-03-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): ?Carbon
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-03-01 00:00:00");
        if (is_null($date)) {
            return null;
        }
        if ($date->dayOfWeek !== UnitValue::SUNDAY) {
            $date->next(UnitValue::SUNDAY);
        }
        // Move to the following Sunday -> second Sunday in March
        $date->next(UnitValue::SUNDAY);

        return $date;
    }
}
