<?php

use Carbon\Carbon;
use UsefulDatesUsHolidays\Holidays\OrthodoxEaster;

it('is the date in 2016', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2016, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2016, 5, 1));
});

it('is the date in 2017', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2017, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2017, 4, 16));
});

it('is the date in 2018', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2018, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2018, 4, 8));
});

it('is the date in 2019', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2019, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2019, 4, 28));
});

it('is the date in 2020', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2020, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2020, 4, 19));
});

it('is the date in 2021', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2021, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2021, 5, 2));
});

it('is the date in 2022', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2022, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2022, 4, 24));
});

it('is the date in 2023', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2023, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2023, 4, 16));
});

it('is the date in 2024', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2024, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2024, 5, 5));
});

it('is the date in 2025', function (): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create(2025, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create(2025, 4, 20));
});

// Julian-to-Gregorian offset varies by century (10 days in the 1600s, 11 in the 1700s,
// 12 in the 1800s, 13 in 1900-2099, 14 in the 2100s, 15 in the 2200s).
// Expected dates were computed independently with PHP's calendar extension
// (easter_days(..., CAL_EASTER_ALWAYS_JULIAN) converted via Julian Day numbers).
it('is the correct date across centuries', function (int $year, int $month, int $day): void {
    $holiday = new OrthodoxEaster;
    $holiday->setCurrentDate(Carbon::create($year, 1, 1));
    expect($holiday->date())->toEqual(Carbon::create($year, $month, $day));
})->with([
    '1600' => [1600, 4, 2],
    '1650' => [1650, 4, 24],
    '1699' => [1699, 4, 19],
    '1700' => [1700, 4, 11],
    '1750' => [1750, 4, 26],
    '1800' => [1800, 4, 20],
    '1850' => [1850, 5, 5],
    '1899' => [1899, 4, 30],
    '1900' => [1900, 4, 22],
    '1950' => [1950, 4, 9],
    '1999' => [1999, 4, 11],
    '2100' => [2100, 5, 2],
    '2101' => [2101, 4, 24],
    '2150' => [2150, 4, 19],
    '2199' => [2199, 4, 21],
    '2200' => [2200, 4, 6],
    '2250' => [2250, 4, 28],
    '2299' => [2299, 4, 23],
]);
