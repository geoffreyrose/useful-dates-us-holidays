<?php

use Carbon\Carbon;
use UsefulDatesUsHolidays\Holidays\JuneteenthObserved;

it('returns null in a year without an observed date (e.g., 2025)', function (): void {
    $holiday = new JuneteenthObserved;
    $holiday->setCurrentDate(Carbon::create(2025, 6, 19)); // Thursday in 2025; not observed
    expect($holiday->date())->toBeNull();
});

it('returns the observed date when June 19 is Saturday (observed Friday, 2021-06-18)', function (): void {
    $holiday = new JuneteenthObserved;
    $holiday->setCurrentDate(Carbon::create(2021, 6, 18)); // Friday observed date
    expect($holiday->date())->toEqual(Carbon::create(2021, 6, 18));
});
