<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class VeteransDayObserved extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
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

        if ($date->dayOfWeek === CarbonInterface::SUNDAY) {
            if ($this->currentDate->copy()->subDay()->isBirthday($date)) {
                $date->next(CarbonInterface::MONDAY);

                return $date;
            }
        } elseif ($date->dayOfWeek === CarbonInterface::SATURDAY) {
            $date->previous(CarbonInterface::FRIDAY);

            return $date;
        }

        return null;
    }
}
