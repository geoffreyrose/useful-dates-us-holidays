<?php

namespace UsefulDatesUsHolidays\Abstracts;

use UsefulDates\Abstracts\UsefulDateAbstract;
use UsefulDatesUsHolidays\Interfaces\HolidayUsefulDateInterface;

abstract class HolidayUsefulDateAbstract extends UsefulDateAbstract implements HolidayUsefulDateInterface
{
    public bool $is_bank_holiday = false {
        set => $this->is_bank_holiday = $value;
        get => $this->is_bank_holiday;
    }

    public bool $is_federal_holiday = false {
        set => $this->is_federal_holiday = $value;
        get => $this->is_federal_holiday;
    }

    public ?int $bank_holiday_start_year = null {
        set => $this->bank_holiday_start_year = $value;
        get => $this->bank_holiday_start_year;
    }

    public ?int $bank_holiday_end_year = null {
        set => $this->bank_holiday_end_year = $value;
        get => $this->bank_holiday_end_year;
    }

    public ?int $federal_holiday_start_year = null {
        set => $this->federal_holiday_start_year = $value;
        get => $this->federal_holiday_start_year;
    }

    public ?int $federal_holiday_end_year  = null{
        set => $this->federal_holiday_end_year = $value;
        get => $this->federal_holiday_end_year;
    }
}
