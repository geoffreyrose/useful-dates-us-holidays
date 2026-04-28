<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\Constants\UnitValue;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class FathersDay extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "Father's Day";
        $this->additional_search_names = ["FATHER'S DAY", 'FATHERS DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1910-06-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): ?Carbon
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-06-01 00:00:00");
        if (is_null($date)) {
            return null;
        }
        if ($date->dayOfWeek !== UnitValue::SUNDAY) {
            $date->next(UnitValue::SUNDAY);
        }
        $date->next(UnitValue::SUNDAY)->next(UnitValue::SUNDAY);

        return $date;
    }
}
