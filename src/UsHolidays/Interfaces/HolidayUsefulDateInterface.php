<?php

namespace UsefulDatesUsHolidays\Interfaces;

interface HolidayUsefulDateInterface
{
    public bool $is_bank_holiday {
        set;
        get;
    }

    public bool $is_federal_holiday {
        set;
        get;
    }

    public ?int $bank_holiday_start_year {
        set;
        get;
    }

    public ?int $bank_holiday_end_year {
        set;
        get;
    }

    public ?int $federal_holiday_start_year {
        set;
        get;
    }

    public ?int $federal_holiday_end_year {
        set;
        get;
    }
}
