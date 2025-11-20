<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class MothersDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = "Mother's Day";
        $this->additional_search_names = ["MOTHER'S DAY", 'MOTHERS DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '1914-05-01');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $date = Carbon::createFromFormat('Y-m-d', "{$this->currentDate->year}-05-01");
        if ($date->dayOfWeek !== CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::SUNDAY);
        }
        // Second Sunday in May
        $date->next(CarbonInterface::SUNDAY);

        return $date;
    }
}
