<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class Hanukkah extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Hanukkah';
        $this->additional_search_names = ['HANUKKAH'];
        // Negative years are not supported by Carbon; set a reasonable historical placeholder
        $this->start_date = Carbon::create(1, 1, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $greg = jdtogregorian(jewishtojd(3, 25, 3761 + $this->currentDate->year));

        return Carbon::createFromFormat('m/d/Y', $greg)->startOfDay();
    }
}
