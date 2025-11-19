<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class BlackFriday extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Black Friday';
        $this->additional_search_names = ['BLACK FRIDAY', 'DAY AFTER THANKSGIVING'];
        $this->start_date = Carbon::create(1951, 11, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        // Compute Thanksgiving (4th Thursday in November) and then add one day
        $date = Carbon::create($this->currentDate->year, 11, 1, 0, 0, 0);
        if ($date->dayOfWeek !== CarbonInterface::THURSDAY) {
            $date->next(CarbonInterface::THURSDAY);
        }
        $date->next(CarbonInterface::THURSDAY)->next(CarbonInterface::THURSDAY)->next(CarbonInterface::THURSDAY);

        return $date->addDay();
    }
}
