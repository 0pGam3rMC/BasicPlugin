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
        $form->setContent(TF::BLUE . "Welcome to this server's Main Menu UI Made by Crafter20162017!\nHopefully you'll learn a thing or two while your here :) ");
        $form->addButton(TF::GREEN . "Our Discord");
        $form->addButton(TF::AQUA . "Our Vote website");
        $form->addButton(TF::RED . "Back");
	    if ($sender instanceof Player) {
        $form->sendToPlayer($sender);
		    }
    }
    public function discordForm($sender){
		$plugin = $this->getServer()->getPluginManager();
        $formapi = $plugin->getPlugin("FormAPI");
        $form = $formapi->createSimpleForm(function (Player $event, array $args){
        $form->setTitle(TF::DARK_GRAY . "-=- " . TF::GREEN . "Discord" . TF::DARK_GRAY . " -=-" );
        $form->setContent(TF::BLUE . "You can join our discord at bit.do/skydiscord");
	     $form->addButton(TF::RED . "Exit");
	    if($sender instanceof Player){
		    $form->sendToPlayer($sender);
		    }
	    }
      }  
    public function aboutForm($sender){
	$plugin = $this->getServer()->getPluginManager();
        $formapi = $plugin->getPlugin("FormAPI");

	
        $form = $formapi->createSimpleForm(function (Player $event, array $args){
		   $form->setTitle(TF::GREEN . "About Server");
        $form->setContent(TF::RED . "This server was made by Crafter20162017!\nWe are a BETA server meaning in development\n You can run commands like /shop /kit /sb info /pvp and so much more!\n Need to report something? Contact us at @skyrmpe");
		

		
	    if ($sender instanceof Player){
		    $form->sendToPlayer($sender);
	       }
	    }
      }
    }
