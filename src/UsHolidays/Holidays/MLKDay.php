<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\Constants\UnitValue;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class MLKDay extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Martin Luther King Jr. Day';
        $this->additional_search_names = ['MARTIN LUTHER KING JR. DAY', 'MARTIN LUTHER KING JR DAY', 'MLK DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1986-01-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1986;
        $this->federal_holiday_start_year = 1986;
    }

    public function date(): ?Carbon
    {
        // Third Monday in January
        $date = Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-01-01 00:00:00");
        if (is_null($date)) {
            return null;
        }
        if ($date->dayOfWeek !== UnitValue::MONDAY) {
            $date->next(UnitValue::MONDAY);
        }
        $date->next(UnitValue::MONDAY)->next(UnitValue::MONDAY);

        return $date;
    }
}
