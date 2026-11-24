<?php

namespace UsefulDatesUsHolidays\Holidays;

use Carbon\Carbon;
use UsefulDates\Enums\RepeatFrequency;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class OrthodoxEaster extends HolidayUsefulDateAbstract
{
    public function __construct()
    {
        $this->name = 'Orthodox Easter';
        $this->additional_search_names = ['ORTHODOX EASTER'];
        $this->start_date = Carbon::createFromFormat('Y-m-d H:i:s', '0300-03-21 00:00:00');
        $this->is_repeated = true;
        $this->repeat_frequency = RepeatFrequency::YEARLY;
    }

    public function date(): ?Carbon
    {
        $year = $this->currentDate->year;
        $a = $year % 4;
        $b = $year % 7;
        $c = $year % 19;
        $d = (19 * $c + 15) % 30;
        $e = (2 * $a + 4 * $b - $d + 34) % 7;
        $month = (int) floor(($d + $e + 114) / 31);
        $day = (($d + $e + 114) % 31) + 1;

        // Julian to Gregorian: the gap is 13 days only in 1900-2099
        // (12 days in 1800-1899, 14 days in 2100-2199, ...)
        $julianToGregorianDays = intdiv($year, 100) - intdiv($year, 400) - 2;

        /** @var int $dt */
        $dt = mktime(0, 0, 0, $month, $day + $julianToGregorianDays, $year);

        if ($dt === false) {
            return null;  // @codeCoverageIgnore
        }

        return Carbon::createFromTimestamp($dt)->startOfDay();
    }
}
