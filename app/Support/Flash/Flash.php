<?php

namespace App\Support\Flash;

use Illuminate\Contracts\Session\Session;

class Flash
{
    public const MESSAGE_KEY = 'tg_bot_flash_message';
    public const MESSAGE_CLASS_KEY = 'tg_bot_flash_class';
    public const MESSAGE_TITLE_KEY = 'tg_bot_flash_title';
    public const MESSAGE_ICON_KEY = 'tg_bot_flash_icon';

    public function __construct(protected Session $session)
    {
    }

    public function get(): FlashMessage|null
    {
        $message = $this->session->get(self::MESSAGE_KEY);

        if (!$message) {
            return null;
        }

        return new FlashMessage(
            $message,
            $this->session->get(self::MESSAGE_CLASS_KEY, ''),
            $this->session->get(self::MESSAGE_TITLE_KEY, ''),
            $this->session->get(self::MESSAGE_ICON_KEY, ''),
        );
    }

    public function success(string $message, string $title): void
    {
        $this->flash($message, 'success', $title);
    }

    public function info(string $message, string $title): void
    {
        $this->flash($message, 'info', $title);
    }

    public function alert(string $message, string $title): void
    {
        $this->flash($message, 'alert', $title);
    }

    private function flash(string $message, string $name, string $title): void
    {
        $this->session->flash(self::MESSAGE_KEY, $message);
        $this->session->flash(self::MESSAGE_CLASS_KEY, config("flash.$name", ''));
        $this->session->flash(self::MESSAGE_TITLE_KEY, $title);
        $this->session->flash(self::MESSAGE_ICON_KEY, config("flash.icon.$name", ''));
    }
}
