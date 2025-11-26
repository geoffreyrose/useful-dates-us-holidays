<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class IndependenceDayObserved extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Independence Day (Observed)';
        $this->additional_search_names = ['INDEPENDENCE DAY', 'FORTH OF JULY', '4TH OF JULY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1777-07-04 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = false;
        $this->is_federal_holiday = false;
        $this->bank_holiday_start_year = null;
        $this->federal_holiday_start_year = null;
    }

    public function date(): ?Carbon
    {
        $date = new IndependenceDay()->setCurrentDate($this->currentDate)->date();

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
