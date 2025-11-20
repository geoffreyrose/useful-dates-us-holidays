<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class Passover extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Passover';
        $this->additional_search_names = ['PASSOVER'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '0001-01-01');
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
