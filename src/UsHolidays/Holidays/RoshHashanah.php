<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class RoshHashanah extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Rosh Hashanah';
        $this->additional_search_names = ['ROSH HASHANAH'];
        $this->start_date = Carbon::createFromFormat( 'Y-m-d H:i:s', '0001-01-01 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $greg = jdtogregorian(jewishtojd(1, 1, 3761 + $this->currentDate->year));

        return Carbon::createFromFormat('m/d/Y', $greg)->startOfDay();
    }
}
