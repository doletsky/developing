<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29.12.2022
 * Time: 12:38
 */
//подключаем класс и файлы локализации
use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);
//добавляем пункт меню для нашего модуля
$menu =   array(
        'parent_menu' => 'global_menu_settings',//определяем место меню, в данном случае оно находится в главном меню
        'sort' => 1,//сортировка, в каком месте будет находится наш пункт
        'text' => Loc::getMessage('MYMODULE_MENU_TITLE'),//описание из файла локализации
        'title' => Loc::getMessage('MYMODULE_MENU_TITLE'),//название из файла локализации
        'url' => 'mymodule_index1.php',//ссылка на страницу из меню
        'items_id' => 'menu_references',//описание подпункта, то же, что и ранее, либо другое, можно вставить сколько угодно пунктов меню
        'items' => array(
            array(
                'text' => Loc::getMessage('MYMODULE_SUBMENU_TITLE'),
                'url' => 'mymodule_index2.php?lang=' . LANGUAGE_ID,
                'more_url' => array('mymodule_index3.php?lang=' . LANGUAGE_ID),
                'title' => Loc::getMessage('MYMODULE_SUBMENU_TITLE'),
            ),
        ),
);

return $menu;