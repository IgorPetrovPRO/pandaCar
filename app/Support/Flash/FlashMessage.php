<?php

namespace App\Support\Flash;

class FlashMessage
{
    public function __construct(
        protected string $message,
        protected string $class,
        protected string $title,
        protected string $icon,
    ) {
    }

    public function message(): string
    {
        return $this->message;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function icon(): string
    {
        return $this->icon;
    }


    public function class(): string
    {
        return $this->class;
    }
}
