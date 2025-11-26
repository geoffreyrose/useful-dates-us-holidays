<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class NewYearsDayObserved extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
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
        if ($this->currentDate->month === CarbonInterface::DECEMBER) {
            $date = new NewYearsDay()->setCurrentDate($this->currentDate->copy()->addYear())->date();
        } else {
            $date = new NewYearsDay()->setCurrentDate($this->currentDate)->date();
        }

        if ($date->dayOfWeek === CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::MONDAY);

            return $date;
        } elseif ($date->dayOfWeek === CarbonInterface::SATURDAY) {
            $date->previous(CarbonInterface::FRIDAY);

            return $date;
        }

        return null;
    }
}
