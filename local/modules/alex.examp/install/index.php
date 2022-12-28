<?php
//���������� �������� ������ ��� ������ � �������
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Entity\Base;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
//� ������ ������ �������� �������� �����, � ����� �� ���������� �����, ������� ������� ��� ��� �������
use Module\Adress\AdressTable;
Loc::loadMessages(__FILE__);
//� �������� ������ ����� �������� ���������� ������ ������, ������ ������ ����� ������ ������ �������������
class examp_alex extends CModule
{
    public function __construct()
    {
        $arModuleVersion = array();
        //���������� ������ ������ (���� ����� ��������� � ������)
        include __DIR__ . '/version.php';
        //����������� ��������� ������ ���������� �� ������ �����
        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }
        //����� �������� ������ ������ ��� � ����������
        $this->MODULE_ID = 'examp_alex';
        // �������� ������
        $this->MODULE_NAME = Loc::getMessage('MYMODULE_MODULE_NAME');
        //�������� ������
        $this->MODULE_DESCRIPTION = Loc::getMessage('MYMODULE_MODULE_DESCRIPTION');
        //���������� �� �������������� ����� ������������� ���� �������, �� ������ N, ��� ��� �� ���������� ��
        $this->MODULE_GROUP_RIGHTS = 'N';
        //�������� �������� �������� ��������������� ������
        $this->PARTNER_NAME = Loc::getMessage('MYMODULE_MODULE_PARTNER_NAME');
        $this->PARTNER_URI = 'https://mysite.com';//����� ������ �����
    }
    //����� �� ��������� ���, ��� ������ �� ����������� ������, �� ��������� ��� ������ � ������� � �������� ����� �������� �������
    public function doInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
    }
    //�������� ����� �������� ������� � ������� ������ �� ��������
    public function doUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}