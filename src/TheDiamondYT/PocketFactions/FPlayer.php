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
 
namespace TheDiamondYT\PocketFactions;

use pocketmine\Player;

use TheDiamondYT\PocketFactions\struct\Role;

class FPlayer {

    private $player;

    private $title;
    
    private $faction;
    private $factionRole;
    
    public function __construct(Player $player) {
        $this->player = $player;
    }
    
    public function getName() {
        return $this->player->getName();
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function setRole($role) {
        if(Role::byName($role) === "unknown")
            throw new \Exception("Error when setting fplayer role: invalid role '$role'");
            
        $this->role = $role;
    }
    
    public function getRole() {
        return $this->role;
    }
    
    public function setFaction(Faction $faction) { 
        if($this->getFaction() !== null)
            $this->getFaction()->removePlayer($this);
            
        $faction->addPlayer($this); 
        $this->faction = $faction;
    }
    
    public function getFaction() {     
        return $this->faction;
    }
}
