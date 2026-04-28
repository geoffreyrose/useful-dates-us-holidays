<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\Constants\UnitValue;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class Thanksgiving extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Thanksgiving';
        $this->additional_search_names = ['THANKSGIVING'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1621-11-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1789;
        $this->federal_holiday_start_year = 1789;
    }

    public function date(): ?Carbon
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-11-01 00:00:00");
        if (is_null($date)) {
            return null;
        }
        if ($date->dayOfWeek !== UnitValue::THURSDAY) {
            $date->next(UnitValue::THURSDAY);
        }
        // Advance to the 4th Thursday of November
        $date->next(UnitValue::THURSDAY)->next(UnitValue::THURSDAY)->next(UnitValue::THURSDAY);

        return $date;
    }
}
