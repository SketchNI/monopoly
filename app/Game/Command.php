<?php

namespace App\Game;

use App\Enums\CommandType;
use Random\RandomException;

class Command
{
    private static array $params = [
        'doubles' => 0,
    ];

    private static function _mergeParams(array $params): void
    {
        self::$params = array_merge(self::$params, $params);
    }

    /**
     * @throws RandomException
     */
    private static function roll_dice(array $params): array
    {
        self::_mergeParams($params);

        $dice_1 = random_int(1, 1);
        $dice_2 = random_int(1, 1);

        if ($dice_1 === $dice_2) {
            if (self::$params['doubles'] === 3) {
                self::run(CommandType::CMD_GO_TO_JAIL->value);
                return [];
            }
            self::$params['doubles']++;
        }

        return [$dice_1, $dice_2, self::$params];
    }

    private static function go_to_jail(array $params): array
    {
        self::_mergeParams($params);

    }

    public static function run($command, array $params = [])
    {
        self::_mergeParams($params);

        return self::{$command}($params);
    }
}
