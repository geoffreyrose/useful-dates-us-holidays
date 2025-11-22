<?php

it('is the date in 2016', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2016, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2016, 4, 23));
});

it('is the date in 2017', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2017, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2017, 4, 11));
});

it('is the date in 2018', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2018, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2018, 3, 31));
});

it('is the date in 2019', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2019, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2019, 4, 20));
});

it('is the date in 2020', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2020, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2020, 4, 9));
});

it('is the date in 2021', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2021, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2021, 3, 28));
});

it('is the date in 2022', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2022, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2022, 4, 16));
});

it('is the date in 2023', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2023, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2023, 4, 6));
});

it('is the date in 2024', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2024, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2024, 4, 23));
});

it('is the date in 2025', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Passover;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2025, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2025, 4, 13));
});
