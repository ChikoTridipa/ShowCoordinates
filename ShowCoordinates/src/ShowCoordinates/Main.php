<?php

namespace ShowCoordinates;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\network\mcpe\protocol\GameRulesChangedPacket;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as C;
use pocketmine\utils\server;

class Main extends PluginBase implements Listener{
	public function onEnable(){
	$this->getServer()->getLogger()->info(C::GREEN."ShowCoordinates Enable!");
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	/** @var  GameRulesChangedPacket $pk */
	public function handleJoin(PlayerJoinEvent $ev){
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	$player = $ev->getPlayer();
	$pk = new GameRulesChangedPacket();
	$pk->gameRules = ["showcoordinates" => [1, true]];
	$player->dataPacket($pk);
	}
}

