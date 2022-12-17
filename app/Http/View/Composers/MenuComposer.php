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
            ->add(MenuItem::make(route('countries.index'), __('menu.side.countries'), 'map-pin'))
            ->add(MenuItem::make(route('faq-categories.index'), __('menu.side.faqs'), 'help-circle'))
            ->add(MenuItem::make(route('reviews.index'), __('menu.side.reviews'), 'message-square'))
            ->add(MenuItem::make('',__('menu.side.devider'),''))
            ->add(MenuItem::make(route('properties.index'),__('menu.side.property'),'settings'))
            ->add(MenuItem::make(route('categories.index'),__('menu.side.categories'),'list'));

        $view->with('menuSide', $menuSide);
    }
}
