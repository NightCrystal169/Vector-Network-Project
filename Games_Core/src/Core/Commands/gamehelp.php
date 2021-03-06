<?php
/**
 * Created by PhpStorm.
 * User: InkoHX
 * Date: 2018/06/12
 * Time: 13:59
 */

namespace Core\Commands;

use Core\{
    Main
};

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class gamehelp extends PluginCommand
{
    protected $plugin;
    /**
     * gamehelp constructor.
     * @param Main $plugin
     */
    public function __construct(Main $plugin)
    {
        parent::__construct("gamehelp", $plugin);
        $this->setPermission("vector.network.player");
        $this->setDescription("Vector Network で使えるコマンド一覧を表示します。");
        $this->plugin = $plugin;
    }

    /**
     * @param CommandSender $sender
     * @param string $commandLabel
     * @param array $args
     * @return bool
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args) : bool
    {
        if (!$this->plugin->isEnabled()) {
            return false;
        }
        if (!$this->testPermission($sender)) {
            return false;
        }
        if ($sender instanceof Player) {
            $message = [];
            /* $packet = new ModalFormRequestPacket();
            $packet->formId = mt_rand(1111111,9999999);
            $packet->formData = json_encode($message); */
            $sender->sendMessage("test");
            return true;
        }
        $sender->sendMessage(TextFormat::RED."このコマンドはプレイヤーのみが実行できます。");
        return true;
    }
}
