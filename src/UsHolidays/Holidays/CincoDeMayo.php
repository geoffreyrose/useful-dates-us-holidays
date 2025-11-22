<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class CincoDeMayo extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Cinco de Mayo';
        $this->additional_search_names = ['CINCO DE MAYO'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '1862-05-05 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', "{$this->currentDate->year}-05-05 00:00:00");
    }
}
