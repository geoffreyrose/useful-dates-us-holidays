<?php

use Carbon\Carbon;
use UsefulDatesUsHolidays\Holidays\VeteransDayObserved;

it('returns null in a year without an observed date (e.g., 2025)', function (): void {
    $holiday = new VeteransDayObserved;
    $holiday->setCurrentDate(Carbon::create(2025, 11, 11)); // Tuesday in 2025; not observed
    expect($holiday->date())->toBeNull();
});

it('returns the observed date when Nov 11 is Saturday (observed Friday, 2023-11-10)', function (): void {
    $holiday = new VeteransDayObserved;
    $holiday->setCurrentDate(Carbon::create(2023, 11, 10)); // Friday observed date
    expect($holiday->date())->toEqual(Carbon::create(2023, 11, 10));
});
