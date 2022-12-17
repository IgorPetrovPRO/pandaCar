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
            ->add(MenuItem::make(route('home'), __('menu.side.home'), 'home'))
            ->add(MenuItem::make(route('countries.index'), __('menu.side.countries'), ''))
            ->add(MenuItem::make(route('faqs.index'), __('menu.side.faqs'), ''))
            ->add(MenuItem::make(route('reviews.index'), __('menu.side.reviews'), ''));
            //->add(MenuItem::make('',__('menu.side.devider'),''))
            //->addIf(true,MenuItem::make('-',__('profile.personal_data.menu'),'user',$menuSideProfile))

        $view->with('menuSide', $menuSide);
    }
}
