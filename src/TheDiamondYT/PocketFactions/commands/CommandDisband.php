<?php
/*
 *  _____           _        _   ______         _   _                 
 * |  __ \         | |      | | |  ____|       | | (_)                
 * | |__) |__   ___| | _____| |_| |__ __ _  ___| |_ _  ___  _ __  ___ 
 * |  ___/ _ \ / __| |/ / _ \ __|  __/ _` |/ __| __| |/ _ \| '_ \/ __|
 * | |  | (_) | (__|   <  __/ |_| | | (_| | (__| |_| | (_) | | | \__ \
 * |_|   \___/ \___|_|\_\___|\__|_|  \__,_|\___|\__|_|\___/|_| |_|___/
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.     
 *
 * PocketFactions v1.0.0 by Luke (TheDiamondYT)
 * All rights reserved.                         
 */
 
namespace TheDiamondYT\PocketFactions\commands;

use pocketmine\command\CommandSender;

use TheDiamondYT\PocketFactions\Main;
use TheDiamondYT\PocketFactions\Faction;
use TheDiamondYT\PocketFactions\struct\Role;

class CommandDisband extends FCommand {

    public function __construct(Main $plugin) {
        parent::__construct($plugin, "disband", $this->translate("disband.desc"), $this->translate("disband.args"));
    }

    public function execute(CommandSender $sender, array $args) {
        if(count($args) >= 2 or count($args) === 0) {
            $sender->sendMessage($this->getUsage());
            return;
        }
        if($this->fme->getFaction() === null) {
            $sender->sendMessage($this->translate("player.notinfaction"));
            return;
        }
        if($this->fme->getRole() !== Role::LEADER) {
            $sender->sendMessage($this->translate("player.mustbeleader"));
            return;
        }
        //$this->plugin->getProvider()->disbandFaction($this->fme->getFaction()):
    }
}