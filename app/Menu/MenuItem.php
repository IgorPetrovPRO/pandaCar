<?php

declare(strict_types=1);

namespace App\Menu;

use App\Support\Traits\Makeable;


final class MenuItem
{
    use Makeable;

    public function __construct(
        protected string $link,
        protected string $label,
        protected string $icon,
        protected mixed $subMenu = '',
    ) {
    }

    public function link(): string
    {
        return $this->link;
    }

    public function label(): string
    {
        return $this->label;
    }

    public function icon(): string
    {
        return $this->icon;
    }

    public function subMenu()
    {
        return $this->subMenu;
    }

    public function isActive(): bool
    {
        if($this->link() == ''){
            return false;
        }

        $path = parse_url($this->link(), PHP_URL_PATH) ?? '/';

        if ($path === '/') {
            return request()->path() === $path;
        }

        return request()->fullUrlIs($this->link() . '*');
    }

    public function childActive():bool{
        if($this->subMenu()){
            foreach($this->subMenu() as $childItem){
                if($childItem->isActive())
                {
                    return true;
                }
                //Потомки 3 уровня проверяем
                if($childItem->subMenu()){
                    foreach($childItem->subMenu() as $childItem2){
                        if($childItem2->isActive())
                        {
                            return true;
                        }
                    }
                }
            }
        }
        return false;
    }

}
