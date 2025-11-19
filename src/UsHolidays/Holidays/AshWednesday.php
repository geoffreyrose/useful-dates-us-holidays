<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class AshWednesday extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Ash Wednesday';
        $this->additional_search_names = ['ASH WEDNESDAY'];
        $this->start_date = Carbon::create(1200, 3, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        // 46 days before Easter
        $easter = (new Easter)
            ->setCurrentDate($this->currentDate)
            ->date();

        return $easter->copy()->subDays(46);
    }
}
