<?php

namespace App\Enums;

use BenSampo\Enum\Enum;
use BenSampo\Enum\Contracts\LocalizedEnum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Status extends Enum implements LocalizedEnum
{
    const PRIVATE =  0;
    const PUBLIC =  1;
    
    public static function getDescription($value): string
    {
        switch ($value){
            case self::PRIVATE:
                return '非公開';
                brake;
            case self::PUBLIC:
                return '公開';
                brake;
            default:
                return self::getKey($value);
        }
    }
}
