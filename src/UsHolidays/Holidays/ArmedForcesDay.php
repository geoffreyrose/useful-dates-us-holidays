<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\Constants\UnitValue;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class ArmedForcesDay extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Armed Forces Day';
        $this->additional_search_names = ['ARMED FORCES DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1949-05-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): ?Carbon
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-05-01 00:00:00");
        if (is_null($date)) {
            return null;
        }

        if ($date->dayOfWeek !== UnitValue::SATURDAY) {
            $date->next(UnitValue::SATURDAY);
        }
        $date->next(UnitValue::SATURDAY)->next(UnitValue::SATURDAY);

        return $date;
    }
}
