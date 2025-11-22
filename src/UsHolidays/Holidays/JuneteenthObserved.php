<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class JuneteenthObserved extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Juneteenth  (Observed)';
        $this->additional_search_names = ['JUNETEENTH'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1866-06-19 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = false;
        $this->is_federal_holiday = false;
        $this->bank_holiday_start_year = null;
        $this->federal_holiday_start_year = null;
    }

    public function date(): ?Carbon
    {
        $dayOfWeek = $this->currentDate->dayOfWeek;

        $date = new Juneteenth()->setCurrentDate($this->currentDate)->date();

        if ($dayOfWeek === CarbonInterface::MONDAY && $date->dayOfWeek === CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::MONDAY);

            return $date;
        } elseif ($dayOfWeek === CarbonInterface::FRIDAY && $date->dayOfWeek === CarbonInterface::SATURDAY) {
            $date->previous(CarbonInterface::FRIDAY);

            return $date;
        }

        return null;
    }
}
