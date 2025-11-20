<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class PalmSunday extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Palm Sunday';
        $this->additional_search_names = ['PALM SUNDAY'];
        $this->start_date = Carbon::create(300, 3, 21, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        // One week before Easter
        $easter = (new Easter)
            ->setCurrentDate($this->currentDate)
            ->date();

        return $easter->copy()->subWeek();
    }
}
