<?php
/**
 * Auto generated from PB_error_code.proto at 2017-08-17 23:26:56
 */

namespace {
/**
 * PB_ErrorCode enum
 */
final class PB_ErrorCode
{
    const Error_None = 0;
    const Error_success = 1;
    const Error_repeated_create = 2;
    const Error_data_save = 3;
    const Error_argument = 4;
    const Error_server_logic = 5;
    const Error_gold_not_enough = 6;
    const Error_no_playerdata = 7;
    const Error_repeated_login = 8;
    const Error_in_gaming_status = 9;
    const Error_no_this_player = 10;
    const Error_server_full = 11;
    const Error_account_blocked = 12;
    const Error_no_account = 13;
    const Error_diamond_not_enough = 14;
    const Error_no_gameserver = 15;
    const Error_other_device_login = 16;
    const Error_create_max = 17;
    const Error_acountname_rule = 18;
    const Error_password_rule = 19;
    const Error_opt_invalid = 20;
    const Error_account_pwd = 21;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'Error_None' => self::Error_None,
            'Error_success' => self::Error_success,
            'Error_repeated_create' => self::Error_repeated_create,
            'Error_data_save' => self::Error_data_save,
            'Error_argument' => self::Error_argument,
            'Error_server_logic' => self::Error_server_logic,
            'Error_gold_not_enough' => self::Error_gold_not_enough,
            'Error_no_playerdata' => self::Error_no_playerdata,
            'Error_repeated_login' => self::Error_repeated_login,
            'Error_in_gaming_status' => self::Error_in_gaming_status,
            'Error_no_this_player' => self::Error_no_this_player,
            'Error_server_full' => self::Error_server_full,
            'Error_account_blocked' => self::Error_account_blocked,
            'Error_no_account' => self::Error_no_account,
            'Error_diamond_not_enough' => self::Error_diamond_not_enough,
            'Error_no_gameserver' => self::Error_no_gameserver,
            'Error_other_device_login' => self::Error_other_device_login,
            'Error_create_max' => self::Error_create_max,
            'Error_acountname_rule' => self::Error_acountname_rule,
            'Error_password_rule' => self::Error_password_rule,
            'Error_opt_invalid' => self::Error_opt_invalid,
            'Error_account_pwd' => self::Error_account_pwd,
        );
    }
}
}