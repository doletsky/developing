<?php
//подключаем основные классы для работы с модулем
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Entity\Base;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
//в данном модуле создадим адресную книгу, и здесь мы подключаем класс, который создаст нам эту таблицу
use Module\Adress\AdressTable;
Loc::loadMessages(__FILE__);
//в названии класса пишем название директории нашего модуля, только вместо точки ставим нижнее подчеркивание
class alex_examp extends CModule
{
    public function __construct()
    {
        $arModuleVersion = array();
        //подключаем версию модуля (файл будет следующим в списке)
        include __DIR__ . '/version.php';
        //присваиваем свойствам класса переменные из нашего файла
        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }
        //пишем название нашего модуля как и директории
        $this->MODULE_ID = 'alex.examp';
        // название модуля
        $this->MODULE_NAME = Loc::getMessage('MYMODULE_MODULE_NAME');
        //описание модуля
        $this->MODULE_DESCRIPTION = Loc::getMessage('MYMODULE_MODULE_DESCRIPTION');
        //используем ли индивидуальную схему распределения прав доступа, мы ставим N, так как не используем ее
        $this->MODULE_GROUP_RIGHTS = 'N';
        //название компании партнера предоставляющей модуль
        $this->PARTNER_NAME = Loc::getMessage('MYMODULE_MODULE_PARTNER_NAME');
        $this->PARTNER_URI = 'https://mysite.com';//адрес вашего сайта
    }
    //здесь мы описываем все, что делаем до инсталляции модуля, мы добавляем наш модуль в регистр и вызываем метод создания таблицы
    public function doInstall()
    {
        global $APPLICATION;
        ModuleManager::RegisterModule($this->MODULE_ID);
        return true;
    }
    //вызываем метод удаления таблицы и удаляем модуль из регистра
    public function doUninstall()
    {
        global $APPLICATION;
        ModuleManager::unRegisterModule($this->MODULE_ID);
        return true;
    }
}