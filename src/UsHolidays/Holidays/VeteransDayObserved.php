<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\Constants\UnitValue;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class VeteransDayObserved extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Veterans Day (Observed)';
        $this->additional_search_names = ['VETERANS DAY', 'ARMISTICE DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1919-11-11 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = false;
        $this->is_federal_holiday = false;
        $this->bank_holiday_start_year = null;
        $this->federal_holiday_start_year = null;
    }

    public function date(): ?Carbon
    {
        $date = new VeteransDay()->setCurrentDate($this->currentDate)->date();

        if (is_null($date)) {
            return null;
        }

        if ($date->dayOfWeek === UnitValue::SUNDAY) {
            if ($this->currentDate->copy()->subDay()->isBirthday($date)) {
                $date->next(UnitValue::MONDAY);

                return $date;
            }
        } elseif ($date->dayOfWeek === UnitValue::SATURDAY) {
            $date->previous(UnitValue::FRIDAY);

            return $date;
        }

        return null;
    }
}
