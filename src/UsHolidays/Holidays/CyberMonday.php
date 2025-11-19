<?php

namespace UsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class CyberMonday extends \UsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Cyber Monday';
        $this->additional_search_names = ['CYBER MONDAY'];
        $this->start_date = Carbon::create(2005, 11, 1, 0, 0, 0);
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        // Cyber Monday is the Monday following Thanksgiving (4th Thursday in November) => Thanksgiving + 4 days
        $thanksgiving = (new Thanksgiving)
            ->setCurrentDate($this->currentDate)
            ->date();

        return $thanksgiving->copy()->addDays(4);
    }
}
