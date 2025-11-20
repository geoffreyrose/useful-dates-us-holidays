<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class MLKDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Martin Luther King Jr. Day';
        $this->additional_search_names = ['MARTIN LUTHER KING JR. DAY', 'MARTIN LUTHER KING JR DAY', 'MLK DAY'];
        $this->start_date = Carbon::create(1986, 1, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;

        $this->is_bank_holiday = true;
        $this->is_federal_holiday = true;
        $this->bank_holiday_start_year = 1986;
        $this->federal_holiday_start_year = 1986;
    }

    public function date(): Carbon
    {
        // Third Monday in January
        $date = Carbon::create($this->currentDate->year, 1, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::MONDAY) {
            $date->next(CarbonInterface::MONDAY);
        }
        $date->next(CarbonInterface::MONDAY)->next(CarbonInterface::MONDAY);

        return $date;
    }
}
