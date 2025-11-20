<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class IndependenceDayObserved extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Independence Day (Observed)';
        $this->additional_search_names = ['INDEPENDENCE DAY', 'FORTH OF JULY', '4TH OF JULY'];
        $this->start_date = Carbon::create(1777, 7, 4, 0, 0, 0);
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

        $date = new IndependenceDay()->setCurrentDate($this->currentDate)->date();

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
