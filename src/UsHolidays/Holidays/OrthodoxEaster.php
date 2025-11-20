<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;

class OrthodoxEaster extends \UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Orthodox Easter';
        $this->additional_search_names = ['ORTHODOX EASTER'];
        $this->start_date = Carbon::createFromFormat('Y-m-d', '0300-03-21');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): Carbon
    {
        $year = $this->currentDate->year;
        $a = $year % 4;
        $b = $year % 7;
        $c = $year % 19;
        $d = (19 * $c + 15) % 30;
        $e = (2 * $a + 4 * $b - $d + 34) % 7;
        $month = (int) floor(($d + $e + 114) / 31);
        $day = (($d + $e + 114) % 31) + 1;

        // Convert to timestamp and add 13 days (Julian to Gregorian diff)
        $dt = mktime(0, 0, 0, $month, $day + 13, $year);

        return Carbon::createFromTimestamp($dt)->startOfDay();
    }
}
