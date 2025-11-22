<?php

it('is the date in 2016', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2016, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2016, 12, 26));
});

it('is the date in 2017', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2017, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2017, 12, 26));
});

it('is the date in 2018', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2018, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2018, 12, 26));
});

it('is the date in 2019', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2019, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2019, 12, 26));
});

it('is the date in 2020', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2020, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2020, 12, 26));
});

it('is the date in 2021', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2021, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2021, 12, 26));
});

it('is the date in 2022', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2022, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2022, 12, 26));
});

it('is the date in 2023', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2023, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2023, 12, 26));
});

it('is the date in 2024', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2024, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2024, 12, 26));
});

it('is the date in 2025', function (): void {
    $holiday = new \UsefulDatesUsHolidays\Holidays\Kwanzaa;
    $holiday->setCurrentDate(\Carbon\Carbon::create(2025, 1, 1));
    expect($holiday->date())->toEqual(\Carbon\Carbon::create(2025, 12, 26));
});
