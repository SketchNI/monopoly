<?php

namespace App\Enums;

enum CommandType: string
{
    case CMD_ROLL_DICE = 'roll_dice';
    case CMD_MOVE = 'move';
    case CMD_GO_TO_JAIL = 'go_to_jail';
    case CMD_BUY_PROPERTY = 'buy_property';
    case CMD_SELL_PROPERTY = 'sell_property';
    case CMD_BUY_HOUSE = 'buy_house';
    case CMD_SELL_HOUSE = 'sell_house';
    case CMD_UPGRADE_HOUSE = 'upgrade_house';
    case CMD_DOWNGRADE_HOUSE = 'downgrade_house';
    case CMD_GET_CHANCE = 'get_chance';
    case CMD_GET_COMMUNITY_CHEST = 'get_community_chest';
    case CMD_SWITCH_PLAYER = 'switch_player';
    case CMD_SHUFFLE_CHANCE = 'shuffle_chance';
    case CMD_SHUFFLE_COMMUNITY_CHEST = 'shuffle_community_chest';
    case CMD_GET_MONEY_FROM_BANK = 'get_money_from_bank';
    case CMD_GET_MONEY_FROM_PLAYER = 'get_money_from_player';
    case CMD_GET_MONEY_FROM_FREE_PARKING = 'get_money_from_free_parking';
    case CMD_GIVE_MONEY_TO_PLAYER = 'give_money_to_player';
    case CMD_GIVE_MONEY_TO_FREE_PARKING = 'give_money_to_free_parking';
    case CMD_USE_GET_OUT_OF_JAIL_CARD = 'use_get_out_of_jail_card';
    case CMD_PAY_TO_GET_OUT_OF_JAIL = 'pay_to_get_out_of_jail';
    case CMD_FORFEIT_GAME = 'forfeit_game';
}
