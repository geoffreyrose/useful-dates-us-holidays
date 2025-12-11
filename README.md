<div style="text-align: center;"> 

[![Latest Stable Version](https://img.shields.io/packagist/v/geoffreyrose/useful-dates-us-holidays?style=flat-square)](https://packagist.org/packages/geoffreyrose/useful-dates-us-holidays)
[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/geoffreyrose/useful-dates-us-holidays/tests.yml?branch=main&style=flat-square)](https://github.com/geoffreyrose/useful-dates-us-holidays/actions?query=branch%main)
[![License](https://img.shields.io/github/license/geoffreyrose/useful-dates-us-holidays?style=flat-square)](https://github.com/geoffreyrose/useful-dates-us-holidays/blob/main/LICENSE)
</div>

# US Holidays Extension For Useful Dates

Adds 42 US holidays to use with [Useful Dates](https://github.com/geoffreyrose/useful-dates).

This is the next evolution of [geoffreyrose/us-holidays](https://github.com/geoffreyrose/us-holidays) but for my date package Useful Dates.

### Requirements
* PHP 8.4+
* [Useful Dates](https://github.com/geoffreyrose/useful-dates)

### Supported Holidays
* April Fool's Day
* Armed Forces Day
* Ash Wednesday
* Black Friday
* Christmas Day
* Christmas Eve
* Cinco de Mayo
* Columbus Day
* Cyber Monday
* Daylight Saving (End)
* Daylight Saving (Start)
* Earth Day
* Easter
* Father's Day
* Flag Day
* Good Friday
* Groundhog Day
* Halloween
* Hanukkah
* Independence Day
* Indigenous Peoples' Day
* Juneteenth
* Kwanzaa
* Labor Day
* Martin Luther King Jr. Day
* Memorial Day
* Mother's Day
* New Year's Day
* New Year's Eve
* Orthodox Easter
* Palm Sunday
* Passover
* Patriot Day
* Pearl Harbor Remembrance Day
* Presidents' Day
* Rosh Hashanah
* St. Patrick's Day
* Tax Day
* Thanksgiving
* Valentine's Day
* Veterans Day
* Yom Kippur

Optionally, you can also include the "observed" holidays.

**Observed Holidays** are when the Federal Holiday falls on a Saturday it is observed on the previous day (Friday) or when it falls on a Sunday it is observed on the next day (Monday).

* Christmas Day (Observed)
* Independence Day (Observed)
* Juneteenth (Observed)
* New Year's Day (Observed)
* Veterans Day (Observed)

### Usage

#### Installation

```
composer require geoffreyrose/useful-dates-us-holidays
```

### Basic Usage

```php
use UsefulDates\UsefulDates;

...

$usefulDates = new UsefulDates;
$usefulDates = $usefulDates->setDate(\Carbon\Carbon::create(2000, 4, 1))
$usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

$myDates = $usefulDates->getUsefulDatesInDays(100);

// Or
// $myDates = $usefulDates->getUsefulDatesByYear() // Uses current year set in UsefulDates with setDate();
// $myDates = $usefulDates->getUsefulDatesByYear(2026);
// $myDates = $usefulDates->getUsefulDatesInYears(2);

foreach ($myDates as $myDate) {
   echo $myDate->name . ' -- ' . $myDate->usefulDate()->format('F n, Y') . ' -- Days Away: ' . $myDate->daysAway();
}
```

To include observed holidays, use the `include_observed` option.

```php
use UsefulDates\UsefulDates;

...

$usefulDates = new UsefulDates;
$usefulDates = $usefulDates->setDate(\Carbon\Carbon::now());
$usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class, [
    'include_observed' => true
]);

$myDates = $usefulDates->getUsefulDatesByYear(2026);

```


### Additional Methods

This extension adds two helper methods to check if a date is a bank or federal holiday:

#### isBankHoliday(): bool

Check if the current date is a Bank Holiday and the day it is observed on.

**Bank Holiday Rules:**
- If the holiday falls on Sunday, it is observed the next day (Monday)
- Bank holidays that fall on Saturday are NOT observed on the previous Friday
- Only applies to holidays that can fall Monday - Friday
- Holidays that always fall on weekends are not considered bank holidays

**Returns:**
- `true` if the date is a bank holiday
- `false` if the date is not a bank holiday

**Example:**

```php
$usefulDates = new UsefulDates;
$usefulDates = $usefulDates->setDate(\Carbon\Carbon::parse('2026-01-01')); // New Year's Day (Thursday)
$usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

if ($usefulDates->isBankHoliday()) {
    echo "Banks are closed today!";
}
```

#### isFederalHoliday(): bool

Check if the current date is a Federal Holiday and the day it is observed on.

**Federal Holiday Rules:**
- If the holiday falls on Saturday, it is observed the previous day (Friday)
- If the holiday falls on Sunday, it is observed the next day (Monday)
- Only applies Monday - Friday
- Holidays that always fall on weekends are not considered federal holidays

**Returns:**
- `true` if the date is a federal holiday
- `false` if the date is not a federal holiday

**Example:**

```php
$usefulDates = new UsefulDates;
$usefulDates = $usefulDates->setDate(\Carbon\Carbon::parse('2026-07-03')); // July 4th observed (Friday)
$usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

if ($usefulDates->isFederalHoliday()) {
    echo "Federal offices are closed today!";
}
```

### Getting Holiday Information

You can retrieve holiday information for specific dates:

```php
$usefulDates = new UsefulDates;
$usefulDates = $usefulDates->setDate(\Carbon\Carbon::parse('2026-12-25'));
$usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

$dates = $usefulDates->getUsefulDate();
foreach ($dates as $date) {
    echo $date->name; // "Christmas Day"
}
```

Or get all holidays for a year:

```php
$usefulDates = new UsefulDates;
$usefulDates = $usefulDates->setDate(\Carbon\Carbon::now());
$usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

$holidays2026 = $usefulDates->getUsefulDatesByYear(2026);
```

### Holiday Properties

Each holiday object includes the following properties:

- `name` - The official name of the holiday
- `is_bank_holiday` - Boolean indicating if it's a bank holiday
- `is_federal_holiday` - Boolean indicating if it's a federal holiday
- `bank_holiday_start_year` - The year the holiday became a bank holiday (if applicable)
- `bank_holiday_end_year` - The year the holiday ceased being a bank holiday (if applicable)
- `federal_holiday_start_year` - The year the holiday became a federal holiday (if applicable)
- `federal_holiday_end_year` - The year the holiday ceased being a federal holiday (if applicable)

**Example:**

```php
$usefulDates = new UsefulDates;
$usefulDates = $usefulDates->setDate(\Carbon\Carbon::parse('2026-01-19'));
$usefulDates->addExtension(\UsefulDatesUsHolidays\UsefulDatesUsHolidaysExtension::class);

$dates = $usefulDates->getUsefulDate();
foreach ($dates as $date) {
    echo $date->name; // "Martin Luther King Jr. Day"
    echo $date->is_federal_holiday; // true
    echo $date->federal_holiday_start_year; // 1986
}
```

### Development

### Linting

```
./vendor/bin/pint   
```

### Testing

```
./vendor/bin/pest 
 
./vendor/bin/pest --coverage-html coverage
 
herd coverage ./vendor/bin/pest --coverage-html coverage
```
