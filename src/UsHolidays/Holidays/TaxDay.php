<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class TaxDay extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Tax Day';
        $this->additional_search_names = ['TAX DAY'];
        $this->start_date = Carbon::create(1913, 4, 15, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $date = Carbon::create($this->currentDate->year, 4, 15, 0, 0, 0);
        if ($date->dayOfWeek === CarbonInterface::SATURDAY || $date->dayOfWeek === CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::TUESDAY);
        } elseif ($date->dayOfWeek === CarbonInterface::FRIDAY) {
            $date->next(CarbonInterface::MONDAY);
        }

        return $date;
    }
}
