<?php

namespace App\Http\View\Composers;

use App\Menu\Menu;
use App\Menu\MenuItem;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view): void
    {

        $menuProfile = Menu::make()
            ->add(MenuItem::make(route('profile'), __('menu.profile.personal'), 'user'))
            ->addIf(true, MenuItem::make(route('password'), __('menu.profile.password'), 'lock'));

        $view->with('menuProfile', $menuProfile);


        $menuSide = Menu::make()
            ->add(MenuItem::make(route('home'), __('menu.side.home'), 'home'));
            //->add(MenuItem::make('',__('menu.side.devider'),''))
            //->addIf(true,MenuItem::make('-',__('profile.personal_data.menu'),'user',$menuSideProfile))

        $view->with('menuSide', $menuSide);
    }
}