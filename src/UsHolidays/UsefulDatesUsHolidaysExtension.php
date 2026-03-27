<?php

namespace UsefulDatesUsHolidays;

use Carbon\CarbonInterface;
use UsefulDates\Abstracts\UsefulDatesExtensionAbstract;
use UsefulDatesUsHolidays\Abstracts\HolidayUsefulDateAbstract;
use UsefulDatesUsHolidays\Holidays\AprilFoolsDay;
use UsefulDatesUsHolidays\Holidays\ArmedForcesDay;
use UsefulDatesUsHolidays\Holidays\AshWednesday;
use UsefulDatesUsHolidays\Holidays\BlackFriday;
use UsefulDatesUsHolidays\Holidays\ChristmasDay;
use UsefulDatesUsHolidays\Holidays\ChristmasDayObserved;
use UsefulDatesUsHolidays\Holidays\ChristmasEve;
use UsefulDatesUsHolidays\Holidays\CincoDeMayo;
use UsefulDatesUsHolidays\Holidays\ColumbusDay;
use UsefulDatesUsHolidays\Holidays\CyberMonday;
use UsefulDatesUsHolidays\Holidays\DaylightSavingEnd;
use UsefulDatesUsHolidays\Holidays\DaylightSavingStart;
use UsefulDatesUsHolidays\Holidays\EarthDay;
use UsefulDatesUsHolidays\Holidays\Easter;
use UsefulDatesUsHolidays\Holidays\FathersDay;
use UsefulDatesUsHolidays\Holidays\FlagDay;
use UsefulDatesUsHolidays\Holidays\GoodFriday;
use UsefulDatesUsHolidays\Holidays\GroundhogDay;
use UsefulDatesUsHolidays\Holidays\Halloween;
use UsefulDatesUsHolidays\Holidays\Hanukkah;
use UsefulDatesUsHolidays\Holidays\IndependenceDay;
use UsefulDatesUsHolidays\Holidays\IndependenceDayObserved;
use UsefulDatesUsHolidays\Holidays\IndigenousPeoplesDay;
use UsefulDatesUsHolidays\Holidays\Juneteenth;
use UsefulDatesUsHolidays\Holidays\JuneteenthObserved;
use UsefulDatesUsHolidays\Holidays\Kwanzaa;
use UsefulDatesUsHolidays\Holidays\LaborDay;
use UsefulDatesUsHolidays\Holidays\MemorialDay;
use UsefulDatesUsHolidays\Holidays\MLKDay;
use UsefulDatesUsHolidays\Holidays\MothersDay;
use UsefulDatesUsHolidays\Holidays\NewYearsDay;
use UsefulDatesUsHolidays\Holidays\NewYearsDayObserved;
use UsefulDatesUsHolidays\Holidays\NewYearsEve;
use UsefulDatesUsHolidays\Holidays\OrthodoxEaster;
use UsefulDatesUsHolidays\Holidays\PalmSunday;
use UsefulDatesUsHolidays\Holidays\Passover;
use UsefulDatesUsHolidays\Holidays\PatriotsDay;
use UsefulDatesUsHolidays\Holidays\PearlHarborRemembrance;
use UsefulDatesUsHolidays\Holidays\PresidentsDay;
use UsefulDatesUsHolidays\Holidays\RoshHashanah;
use UsefulDatesUsHolidays\Holidays\StPatricksDay;
use UsefulDatesUsHolidays\Holidays\TaxDay;
use UsefulDatesUsHolidays\Holidays\Thanksgiving;
use UsefulDatesUsHolidays\Holidays\ValentinesDay;
use UsefulDatesUsHolidays\Holidays\VeteransDay;
use UsefulDatesUsHolidays\Holidays\VeteransDayObserved;
use UsefulDatesUsHolidays\Holidays\YomKippur;

class UsefulDatesUsHolidaysExtension extends UsefulDatesExtensionAbstract
{
    public static string $name = 'US Holidays';

    public static string $description = 'Adds 42 US Holidays to Useful Dates as an extension.';

    public static bool $hasMethods = true;

    public static function usefulDates($options = null): array
    {
        $dates = [
            AprilFoolsDay::class,
            ArmedForcesDay::class,
            AshWednesday::class,
            BlackFriday::class,
            ChristmasDay::class,
            ChristmasEve::class,
            CincoDeMayo::class,
            ColumbusDay::class,
            CyberMonday::class,
            DaylightSavingEnd::class,
            DaylightSavingStart::class,
            EarthDay::class,
            Easter::class,
            FathersDay::class,
            FlagDay::class,
            GoodFriday::class,
            GroundhogDay::class,
            Halloween::class,
            Hanukkah::class,
            IndependenceDay::class,
            IndigenousPeoplesDay::class,
            Juneteenth::class,
            Kwanzaa::class,
            LaborDay::class,
            MemorialDay::class,
            MLKDay::class,
            MothersDay::class,
            NewYearsDay::class,
            NewYearsEve::class,
            OrthodoxEaster::class,
            PalmSunday::class,
            Passover::class,
            PatriotsDay::class,
            PearlHarborRemembrance::class,
            PresidentsDay::class,
            RoshHashanah::class,
            StPatricksDay::class,
            TaxDay::class,
            Thanksgiving::class,
            ValentinesDay::class,
            VeteransDay::class,
            YomKippur::class,
        ];

        if ($options && is_array($options) && isset($options['include_observed']) && $options['include_observed'] === true) {
            $dates = array_merge($dates, [
                ChristmasDayObserved::class,
                IndependenceDayObserved::class,
                JuneteenthObserved::class,
                NewYearsDayObserved::class,
                VeteransDayObserved::class,
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

    public function isBankHoliday(): bool
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

        return false;
    }

    public function isFederalHoliday(): bool
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

        return false;
    }
}
