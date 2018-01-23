<?php
namespace OpGamer\CoreUI;
use pocketmine\Server;

use pocketmine\Player;

use pocketmine\plugin\PluginBase as Base;

use pocketmine\utils\TextFormat as TF;

use pocketmine\event\Listener;

use pocketmine\command\Command;

use pocketmine\command\CommandSender;

use jojoe77777\FormAPI;

class Main extends Base implements Listener{
  
    public function onEnable(){
        $this->getLogger()->info("SkyCore Aactivated");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool{
        switch(strtolower($cmd->getName())){
			case "core":
			$this->coreForm($sender);
				/* Check if the player is permitted to use the command */
					
                break;
        }
        return true;
    }
    public function coreForm($sender){
        $plugin = $this->getServer()->getPluginManager();
        $formapi = $plugin->getPlugin("FormAPI");
        $form = $formapi->createSimpleForm(function (Player $event, array $args){
            $result = $args[0];
            $sender = $event->getPlayer();
            if($result === null){
            }
            switch($result){
                case 0:
                    return;
                case 1:
                    $this->discordForm($sender);
                    return;
                case 2:
                    $this->aboutForm($sender);
                    return;
            }
        });
        $form->setTitle(TF::BOLD . TF::GOLD . "SkyRealmPE Menu");
        $form->setContent(TF::WHITE . "Welcome to this server's Main Menu UI Made by Crafter20162017!\n Hopefully you'll learn a thing or two while your here :) ");
        $form->addButton(TF::GREEN . "Our Discord");
        $form->addButton(TF::AQUA . "Our Vote website");
        $form->addButton(TF::RED . "Back");
	    if ($sender instanceof Player) {
        $form->sendToPlayer($sender);
		    }
    }
    public function discordForm($sender){
        $form->setContent(TF::LIGHT_PURPLE . "You can join our discord at bit.do/skydiscord");
	    if ($sender instanceof Player){
		    $form->sendToPlayer($sender);
	    }
      }  
    public function aboutForm($sender){
        $form->setContent(TF::RED . "This server was made by Crafter20162017! \n We are a BETA server meaning in development");
	    if ($sender instanceof Player){
		    $form->sendToPlayer($sender);
	    }
      }
    }
