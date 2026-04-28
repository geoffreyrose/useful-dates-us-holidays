<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use Carbon\Constants\UnitValue;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class TaxDay extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Tax Day';
        $this->additional_search_names = ['TAX DAY'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1913-04-15 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): ?Carbon
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-04-15 00:00:00");
        if (is_null($date)) {
            return null;
        }

        if ($date->dayOfWeek === UnitValue::SATURDAY || $date->dayOfWeek === UnitValue::SUNDAY) {
            $date->next(UnitValue::TUESDAY);
        } elseif ($date->dayOfWeek === UnitValue::FRIDAY) {
            $date->next(UnitValue::MONDAY);
        }

        return $date;
    }
}
