<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/07/22
 * Time: 11:40
 */

namespace Core\Commands;


use Core\Main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;

class debug extends PluginCommand
{
    protected $plugin;
    public function __construct(Main $plugin)
    {
        parent::__construct("debug", $plugin);
        $this->setPermission("vector.network.admin");
        $this->setDescription("Admin Command");
        $this->plugin = $plugin;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if (!$this->plugin->isEnabled()) {
            return false;
        }
        if (!$this->testPermission($sender)) {
            return false;
        }
        if (!$sender instanceof Player) {
            $sender->sendMessage(TextFormat::RED."このコマンドはプレイヤーのみが実行できます。");
            return true;
        }
        $x = $sender->getFloorX();
        $y = $sender->getFloorY();
        $z = $sender->getFloorZ();
        $levelname = $sender->getLevel()->getName();
        $sender->sendMessage("X: $x\nY: $y\nZ: $z\nLevelName: $levelname");
        return true;
    }
}