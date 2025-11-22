<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use UsefulDates\Enums\RepeatFrequency;

class TaxDay extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Tax Day';
        $this->additional_search_names = ['TAX DAY'];
        $this->start_date = Carbon::createFromFormat( 'Y-m-d H:i:s', '1913-04-15 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $date = Carbon::createFromFormat( 'Y-m-d H:i:s', "{$this->currentDate->year}-04-15 00:00:00");
        if ($date->dayOfWeek === CarbonInterface::SATURDAY || $date->dayOfWeek === CarbonInterface::SUNDAY) {
            $date->next(CarbonInterface::TUESDAY);
        } elseif ($date->dayOfWeek === CarbonInterface::FRIDAY) {
            $date->next(CarbonInterface::MONDAY);
        }

        return $date;
    }
}
