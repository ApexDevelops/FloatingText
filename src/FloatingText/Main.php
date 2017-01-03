<?php
	
namespace FloatingText;

use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\utils\TextFormat as TF;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\event\Listener;
use pocketmine\level\particle\FloatingTextParticle;
use pocketmine\level\particle\Particle;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\level\Position\getLevel;
use pocketmine\plugin\PluginManager;
use pocketmine\plugin\Plugin;
use pocketmine\math\Vector3;
use pocketmine\utils\config;
use FloatingText\Commands\cord;
			
class Main extends PluginBase implements Listener{
    
    public function onEnable(){
	$this->saveDefaultConfig();
    	$this->getServer()->getPluginManager()->registerEvents($this ,$this);
        $this->getLogger()->info(TF::GREEN ."Plugin Enabled!");
    }
    
    public function onDisable(){
    	$this->getLogger()->info(TF::RED ."");
    }	
					
			public function onJoin(PlayerJoinEvent $event){
			 $player = $event->getPlayer();
             $level = $player->getLevel();
       $cfg = new Config($this->getDataFolder() . "/config.yml", Config::YAML);
           $x1 = $cfg->get("Xs");
           $y1 = $cfg->get("Ys");
           $z1 = $cfg->get("Zs");
           $x2 = $cfg->get("Xss");
           $y2 = $cfg->get("Yss");
           $z2 = $cfg->get("Zss");
                $line1 = $cfg->get("LINE1");  
                $line2 = $cfg->get("LINE2"); 
                $line3 = $cfg->get("LINE3"); 
                $line4 = $cfg->get("LINE4"); 
                $line5 = $cfg->get("LINE5"); 
                $line6 = $cfg->get("LINE6");  
                $line7 = $cfg->get("LINE7"); 
                $line8 = $cfg->get("LINE8"); 
                $line9 = $cfg->get("LINE9"); 
                $line10 = $cfg->get("LINE10"); 
                     $online = count(Server::getInstance()->getOnlinePlayers()); 
                    $maxonline = $this->getServer()->getMaxPlayers();
                   $playername = $player->getName();
                  $ip = $this->getServer()->getIp();
                 $mote = $this->getServer()->getMotd();
                $port = $this->getServer()->getPort();
               $version = $this->getServer()->getVersion();                                  
              $rs = TF::RESET. "\n";
              $allline = $line1. $rs. $line2. $rs. $line3. $rs. $line4. $rs. $line5;
              $allline = str_replace("{ONLINE}", $online, $allline);
              $allline = str_replace("{MAXONLINE}", $maxonline, $allline);
              $allline = str_replace("{PLAYERNAME}", $playername, $allline);
              $allline = str_replace("{IP}", $ip, $allline);
              $allline = str_replace("{MOTE}", $mote, $allline);
              $allline = str_replace("{PORT}", $port, $allline);
              $allline = str_replace("{VERSION}", $version, $allline);
              $level->addparticle(new FloatingTextParticle(new Vector3($x1, $y1, $z1), $allline));
              
              $allline1 = $line6. $rs. $line7. $rs. $line8. $rs. $line9. $rs. $line10;
              $allline1 = str_replace("{ONLINE}", $online, $allline);
              $allline1 = str_replace("{MAXONLINE}", $maxonline, $allline);
              $allline1 = str_replace("{PLAYERNAME}", $playername, $allline);
              $allline1 = str_replace("{IP}", $ip, $allline);
              $allline1 = str_replace("{MOTE}", $mote, $allline);
              $allline1 = str_replace("{PORT}", $port, $allline);
              $allline1 = str_replace("{VERSION}", $version, $allline);
              $level->addparticle(new FloatingTextParticle(new Vector3($x2, $y2, $z2), $allline1));
            
         }
       public function onLoad(){
		$this->getServer()->getCommandMap()->register("cords", new cord("cords"));
	}
          
}




