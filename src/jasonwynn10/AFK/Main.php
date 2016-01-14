<?php
/**
 * Created by developer: jasonwynn10.
 */

namespace AFK;

use Pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat as Color;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\Listener;
use pocketmine\level\Position;
use pocketmine\level\Level;
use pocketmine\entity\Effect;
use pocketmine\entity\Entity;
use pocketmine\event\player\PlayerGameModeChangeEvent;
use pocketmine\event\player\PlayerInteractEvent;



class main extends PluginBase{

    public function onEnable(){
        $this->getLogger()->info(Color::GREEN."[TutorialPlugin] Enabled!");
    }

    public function onCommand(CommandSender $sender, Command $command, $label, array $args)  {
        if($sender instanceof Player) {
            $name = $sender->getName();
            if(strtolower($command->getName()) == "afk") {
                if(count($args) < 1) {
                    $Phealth = getHealth();
                    $sender->sendMessage(Color::GREEN."[AFK plugin] You are now AFK!");
                    $sender->setHealth(20);
                    $sender->getEffect(10);

                    return;
                }else{
                    $sender->sendMessage(Color::GREEN."[AFK plugin] This command has no arguments!");
                    return;
                }
            }
        }else{
            $sender->sendMessage(Color::RED."That command can only be run in console!");
            return;
        }
    }
}