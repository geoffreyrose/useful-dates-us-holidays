<?php

use Carbon\Carbon;
use UsefulDates\UsefulDates;

// Test holidays that always fall Monday-Friday (Labor Day - first Monday in September)
it('returns true for Labor Day which always falls on Monday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-09-02')); // Labor Day 2024 (Monday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for MLK Day which always falls on Monday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-01-15')); // MLK Day 2024 (Monday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Memorial Day which always falls on Monday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-05-27')); // Memorial Day 2024 (Monday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Presidents Day which always falls on Monday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-02-19')); // Presidents Day 2024 (Monday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Thanksgiving which always falls on Thursday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-11-28')); // Thanksgiving 2024 (Thursday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

// Test holidays that can fall on any day - when they fall Monday-Friday
it('returns true for Independence Day when it falls on a weekday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-07-04')); // Independence Day 2024 (Thursday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Christmas when it falls on a weekday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-12-25')); // Christmas 2024 (Wednesday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for New Years Day when it falls on a weekday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2025-01-01')); // New Year's Day 2025 (Wednesday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Veterans Day when it falls on a weekday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-11-11')); // Veterans Day 2024 (Monday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Juneteenth when it falls on a weekday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-06-19')); // Juneteenth 2024 (Wednesday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

// Test holidays that fall on Sunday - should be observed on Monday
it('returns true for Monday when a federal holiday falls on Sunday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2023-01-02')); // Monday after New Year's Day 2023 (Sunday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Monday when Christmas falls on Sunday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2022-12-26')); // Monday after Christmas 2022 (Sunday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Monday when Veterans Day falls on Sunday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2029-11-12')); // Monday after Veterans Day 2029 (Sunday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

// Test holidays that fall on Saturday - should be observed on Friday
it('returns true for Friday when a federal holiday falls on Saturday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2021-12-24')); // Friday before Christmas 2021 (Saturday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Friday when Independence Day falls on Saturday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2026-07-03')); // Friday before Independence Day 2026 (Saturday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Friday when New Years Day falls on Saturday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2021-12-31')); // Friday before New Year's Day 2022 (Saturday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Friday when Juneteenth falls on Saturday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2027-06-18')); // Friday before Juneteenth 2027 (Saturday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns true for Friday when Veterans Day falls on Saturday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2028-11-10')); // Friday before Veterans Day 2028 (Saturday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

// Test that Saturday and Sunday holidays themselves return false
it('returns false for Saturday when a federal holiday falls on Saturday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2021-12-25')); // Christmas 2021 (Saturday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for Saturday when Independence Day falls on Saturday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2026-07-04')); // Independence Day 2026 (Saturday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for Sunday when a federal holiday falls on Sunday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2023-01-01')); // New Year's Day 2023 (Sunday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for Sunday when Christmas falls on Sunday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2022-12-25')); // Christmas 2022 (Sunday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

// Test dates that are not federal holidays
it('returns false for Columbus Day which is bank holiday but not federal', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-10-14')); // Columbus Day 2024 (Monday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeTrue();
});

it('returns false for Easter which is not a federal holiday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-03-31')); // Easter 2024 (Sunday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for Halloween which is not a federal holiday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-10-31')); // Halloween 2024 (Thursday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for Valentines Day which is not a federal holiday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-02-14')); // Valentine's Day 2024 (Wednesday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for St Patricks Day which is not a federal holiday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-03-17')); // St. Patrick's Day 2024 (Sunday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for Black Friday which is not a federal holiday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-11-29')); // Black Friday 2024 (Friday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for Good Friday which is not a federal holiday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-03-29')); // Good Friday 2024 (Friday)
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

// Test dates that are not holidays at all
it('returns false for a random Tuesday that is not a holiday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-03-12')); // Random Tuesday
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for a random Saturday that is not a holiday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-03-16')); // Random Saturday
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});

it('returns false for a random Sunday that is not a holiday', function (): void {
    $usefulDates = new UsefulDates;
    $usefulDates = $usefulDates->setDate(Carbon::parse('2024-03-10')); // Random Sunday
    $usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

    expect($usefulDates->isFederalHoliday())->toBeFalse();
});
