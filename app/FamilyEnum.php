<?php

namespace App;

enum FamilyEnum:int
{
    case Self = 1;
    case Father = 2;
    case Mother = 3;
    case Wife = 4;
    case MotherInLaw = 5;
    case FatherInLaw = 6;
    case Daughter = 7;
    case Son = 8;
    case GrandFather = 9;
    case GrandMother = 10;
    case GreatGrandFather = 11;
    case GreatGrandMother = 12;

    public static function toArray(): array
    {
        return array_reduce(
            self::cases(),
            fn ($acc, $case) => $acc + [$case->value => $case->name],
            []
        );
    }
}
