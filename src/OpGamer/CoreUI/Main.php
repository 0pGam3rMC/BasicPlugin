<?php
//Property of DevrlyCode & YungFlowz, you do not have permission to copy this plugin.
//Property of DevrlyCode & YungFlowz
//Any And All Usages Involving Non-Authorized Users Will Be Refered To As Meanie Heads
//Copyright © @JazzyDevZ LLC
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
        $player = $sender->getPlayer();
        if(strtolower($cmd->getName()) == "core"){
                 $this->coreFrom($player);
                break;
        }
        return true;
    }
    public function coreForm($player){
        $plugin = $this->getServer()->getPluginManager();
        $formapi = $plugin->getPlugin("FormAPI");
        $form = $formapi->createSimpleForm(function (Player $event, array $args){
            $result = $args[0];
            $player = $event->getPlayer();
            if($result === null){
            }
            switch($result){
                case 0:
                    return;
                case 1:
                    $this->discordForm($player);
                    return;
                case 2:
                    $this->aboutForm($player);
                    return;
            }
        });
        $form->setTitle(TF::BOLD . TF::GREEN . "CoreUI Menu");
        $form->setContent(TF::GREEN . "SkyRealmPE Main Menu");
        $form->addButton(TF::GREEN . "Discord");
        $form->addButton(TF::GREEN . "About");
        $form->addButton(TF::WHITE . "Back");
        $form->sendToPlayer($player);
    }
    public function discordForm($player){
        $form->setContent(TF::WHITE . "You can join our discord at bit.do/skydiscord");          
      }  
    public function aboutForm($player){
        $sender->sendMessage(TF::RED . "This server was made by Crafter20162017! \n We are a BETA server meaning in development");
      }
    }
