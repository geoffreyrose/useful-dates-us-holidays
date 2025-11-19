<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class Passover extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Passover';
        $this->additional_search_names = ['PASSOVER'];
        // Historical start year is negative; Carbon does not support BCE years, use a neutral placeholder
        $this->start_date = Carbon::create(1, 1, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        // Nisan 15 in the Jewish calendar
        $greg = jdtogregorian(jewishtojd(8, 15, 3760 + $this->currentDate->year));

        return Carbon::createFromFormat('m/d/Y', $greg)->startOfDay();
    }
}
