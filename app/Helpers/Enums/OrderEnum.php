<?php

namespace App\Helpers\Enums;

/**
 * OrderStatuses Constants
 */
enum OrderEnum : string
{
    case inProcess = "inProcess";
    case Paid = "Paid";
    case Completed = "Completed";
    case Canceled = "Canceled";


    public static function findByKey (string $key)
    {
        return constant("self::$key");
    }
}
