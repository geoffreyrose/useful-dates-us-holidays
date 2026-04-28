<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\Constants\UnitValue;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class NewYearsDayObserved extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "New Year's Day (Observed)";
        $this->additional_search_names = ["NEW YEAR'S DAY", 'NEW YEARS DAY', 'NEW YEARS'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '0001-01-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = false;
        $this->is_federal_holiday = false;
        $this->bank_holiday_start_year = null;
        $this->federal_holiday_start_year = null;
    }

    public function date(): ?Carbon
    {
        if ($this->currentDate->month === UnitValue::DECEMBER) {
            $date = new NewYearsDay()->setCurrentDate($this->currentDate->copy()->addYear())->date();
        } else {
            $date = new NewYearsDay()->setCurrentDate($this->currentDate)->date();
        }

        if (is_null($date)) {
            return null;
        }

        if ($date->dayOfWeek === UnitValue::SUNDAY) {
            $date->next(UnitValue::MONDAY);

            return $date;
        } elseif ($date->dayOfWeek === UnitValue::SATURDAY) {
            $date->previous(UnitValue::FRIDAY);

            return $date;
        }

        return null;
    }
}
