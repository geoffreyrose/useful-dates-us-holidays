<?php

namespace UsefulDatesUsHolidays;

use Carbon\CarbonInterface;
use UsefulDates\Abstracts\UsefulDatesExtensionAbstract;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;

class UsHolidaysExtension extends UsefulDatesExtensionAbstract
{
    public static string $name = 'US Holidays';

    public static string $description = 'Adds 42 US Holidays to Useful Dates as an extension.';

    public static bool $hasMethods = true;

    public static function usefulDates($options = null): array
    {
        $dates = [
            \UsefulDatesUsHolidays\Holidays\AprilFoolsDay::class,
            \UsefulDatesUsHolidays\Holidays\ArmedForcesDay::class,
            \UsefulDatesUsHolidays\Holidays\AshWednesday::class,
            \UsefulDatesUsHolidays\Holidays\BlackFriday::class,
            \UsefulDatesUsHolidays\Holidays\ChristmasDay::class,
            \UsefulDatesUsHolidays\Holidays\ChristmasEve::class,
            \UsefulDatesUsHolidays\Holidays\CincoDeMayo::class,
            \UsefulDatesUsHolidays\Holidays\ColumbusDay::class,
            \UsefulDatesUsHolidays\Holidays\CyberMonday::class,
            \UsefulDatesUsHolidays\Holidays\DaylightSavingEnd::class,
            \UsefulDatesUsHolidays\Holidays\DaylightSavingStart::class,
            \UsefulDatesUsHolidays\Holidays\EarthDay::class,
            \UsefulDatesUsHolidays\Holidays\Easter::class,
            \UsefulDatesUsHolidays\Holidays\FathersDay::class,
            \UsefulDatesUsHolidays\Holidays\FlagDay::class,
            \UsefulDatesUsHolidays\Holidays\GoodFriday::class,
            \UsefulDatesUsHolidays\Holidays\GroundhogDay::class,
            \UsefulDatesUsHolidays\Holidays\Halloween::class,
            \UsefulDatesUsHolidays\Holidays\Hanukkah::class,
            \UsefulDatesUsHolidays\Holidays\IndependenceDay::class,
            \UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay::class,
            \UsefulDatesUsHolidays\Holidays\Juneteenth::class,
            \UsefulDatesUsHolidays\Holidays\Kwanzaa::class,
            \UsefulDatesUsHolidays\Holidays\LaborDay::class,
            \UsefulDatesUsHolidays\Holidays\MemorialDay::class,
            \UsefulDatesUsHolidays\Holidays\MLKDay::class,
            \UsefulDatesUsHolidays\Holidays\MothersDay::class,
            \UsefulDatesUsHolidays\Holidays\NewYearsDay::class,
            \UsefulDatesUsHolidays\Holidays\NewYearsEve::class,
            \UsefulDatesUsHolidays\Holidays\OrthodoxEaster::class,
            \UsefulDatesUsHolidays\Holidays\PalmSunday::class,
            \UsefulDatesUsHolidays\Holidays\Passover::class,
            \UsefulDatesUsHolidays\Holidays\PatriotsDay::class,
            \UsefulDatesUsHolidays\Holidays\PearlHarborRemembrance::class,
            \UsefulDatesUsHolidays\Holidays\PresidentsDay::class,
            \UsefulDatesUsHolidays\Holidays\RoshHashanah::class,
            \UsefulDatesUsHolidays\Holidays\StPatricksDay::class,
            \UsefulDatesUsHolidays\Holidays\TaxDay::class,
            \UsefulDatesUsHolidays\Holidays\Thanksgiving::class,
            \UsefulDatesUsHolidays\Holidays\ValentinesDay::class,
            \UsefulDatesUsHolidays\Holidays\VeteransDay::class,
            \UsefulDatesUsHolidays\Holidays\YomKippur::class,
        ];

        if ($options && is_array($options) && isset($options['include_observed']) && $options['include_observed'] === true) {
            $dates = array_merge($dates, [
                \UsefulDatesUsHolidays\Holidays\ChristmasDayObserved::class,
                \UsefulDatesUsHolidays\Holidays\IndependenceDayObserved::class,
                \UsefulDatesUsHolidays\Holidays\JuneteenthObserved::class,
                \UsefulDatesUsHolidays\Holidays\NewYearsDayObserved::class,
                \UsefulDatesUsHolidays\Holidays\VeteransDayObserved::class,
            ]);
        }

        return $dates;
    }

    public function methods(): array
    {
        return [
            'isBankHoliday' => [$this, 'isBankHoliday'],
            'isFederalHoliday' => [$this, 'isFederalHoliday'],

        ];
    }

    public function isBankHoliday(): ?bool
    {
        $dayOfWeek = $this->usefulDates->date->dayOfWeek;
        $usefulDates = $this->usefulDates->getUsefulDate();
        foreach ($usefulDates as $usefulDate) {
            if (get_parent_class($usefulDate) === HolidayUsefulDateAbstract::class) {
                if (in_array($dayOfWeek, [
                    CarbonInterface::MONDAY,
                    CarbonInterface::TUESDAY,
                    CarbonInterface::WEDNESDAY,
                    CarbonInterface::THURSDAY,
                    CarbonInterface::FRIDAY,
                ]) && $usefulDate?->is_bank_holiday) {
                    return true;
                }
            }
        }

        if ($dayOfWeek === CarbonInterface::MONDAY) {
            $usefulDates = $this->usefulDates->getUsefulDate($this->usefulDates->date->copy()->subDay(1));
            foreach ($usefulDates as $usefulDate) {
                if (get_parent_class($usefulDate) === HolidayUsefulDateAbstract::class) {
                    if ($usefulDate?->is_bank_holiday) {
                        return true;
                    }
                }
            }
        }

        return null;
    }

    public function isFederalHoliday(): ?bool
    {
        $dayOfWeek = $this->usefulDates->date->dayOfWeek;
        $usefulDates = $this->usefulDates->getUsefulDate();
        foreach ($usefulDates as $usefulDate) {
            if (get_parent_class($usefulDate) === HolidayUsefulDateAbstract::class) {
                if (in_array($dayOfWeek, [
                    CarbonInterface::MONDAY,
                    CarbonInterface::TUESDAY,
                    CarbonInterface::WEDNESDAY,
                    CarbonInterface::THURSDAY,
                    CarbonInterface::FRIDAY,
                ]) && $usefulDate?->is_federal_holiday) {
                    return true;
                }
            }
        }

        if ($dayOfWeek === CarbonInterface::MONDAY) {
            $usefulDates = $this->usefulDates->getUsefulDate($this->usefulDates->date->copy()->subDay(1));
            foreach ($usefulDates as $usefulDate) {
                if (get_parent_class($usefulDate) === HolidayUsefulDateAbstract::class) {
                    if ($usefulDate?->is_federal_holiday) {
                        return true;
                    }
                }
            }
        }

        if ($dayOfWeek === CarbonInterface::FRIDAY) {
            $usefulDates = $this->usefulDates->getUsefulDate($this->usefulDates->date->copy()->addDay(1));
            foreach ($usefulDates as $usefulDate) {
                if (get_parent_class($usefulDate) === HolidayUsefulDateAbstract::class) {
                    if ($usefulDate?->is_federal_holiday) {
                        return true;
                    }
                }
            }
        }

        return null;
    }
}
