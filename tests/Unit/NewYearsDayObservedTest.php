<?php

use Carbon\Carbon;
use UsefulDatesUsHolidays\Holidays\NewYearsDayObserved;

it('returns null in a year without an observed date (e.g., 2025)', function (): void {
    $holiday = new NewYearsDayObserved;
    $holiday->setCurrentDate(Carbon::create(2025, 1, 1)); // Wednesday, not observed
    expect($holiday->date())->toBeNull();
});

it('returns the observed date when Jan 1 is Saturday (observed previous Friday, 2021)', function (): void {
    // Jan 1, 2022 was Saturday, so observed on Friday Dec 31, 2021
    $holiday = new NewYearsDayObserved;
    $holiday->setCurrentDate(Carbon::create(2021, 12, 31)); // Friday observed date
    expect($holiday->date())->toEqual(Carbon::create(2021, 12, 31));
});
