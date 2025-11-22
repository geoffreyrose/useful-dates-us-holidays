<?php

use Carbon\Carbon;
use UsefulDatesUsHolidays\Holidays\ChristmasDayObserved;

it('returns null in a year without an observed date (e.g., 2025)', function (): void {
    $holiday = new ChristmasDayObserved;
    // 2025-12-25 is Thursday; there is no observed day
    // Use a candidate observed weekday (Friday) to ensure logic still returns null
    $holiday->setCurrentDate(Carbon::create(2025, 12, 26)); // Friday
    expect($holiday->date())->toBeNull();
});

it('returns the observed date when Dec 25 is Sunday (observed Monday, 2022-12-26)', function (): void {
    $holiday = new ChristmasDayObserved;
    $holiday->setCurrentDate(Carbon::create(2022, 12, 26)); // Monday observed date
    expect($holiday->date())->toEqual(Carbon::create(2022, 12, 26));
});
