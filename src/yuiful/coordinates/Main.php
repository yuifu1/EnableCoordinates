<?php

namespace yuiful\coordinates;

use pocketmine\plugin\PluginBase;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\Listener;

use pocketmine\network\mcpe\protocol\GameRulesChangedPacket;
use pocketmine\network\mcpe\protocol\types\BoolGameRule;

class Main extends PluginBase implements Listener {

	public function onEnable(): void {
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onJoin(PlayerJoinEvent $event): void {
		$packet = GameRulesChangedPacket::create(["showCoordinates" => (new BoolGameRule(true, true))]);
		$player = $event->getPlayer();
		$session = $player->getNetworkSession();
		$session->sendDataPacket($packet);
	}

}