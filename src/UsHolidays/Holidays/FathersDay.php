<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class FathersDay extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "Father's Day";
        $this->additional_search_names = ["FATHER'S DAY", 'FATHERS DAY'];
        $this->start_date = Carbon::create(1910, 6, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $date = Carbon::create($this->currentDate->year, 6, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::SUNDAY);
        }
        $date->next(CarbonInterface::SUNDAY)->next(CarbonInterface::SUNDAY);

        return $date;
    }
}
