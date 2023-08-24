<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$connection = \Bitrix\Main\Application::getConnection();

class DealFromCashInModel
{

    const SQL_SELECT_DEAL_FROM_CASH_IN = "SELECT `VALUE` FROM `b_iblock_element_property` WHERE `IBLOCK_ELEMENT_ID` IN (SELECT `ID` FROM `b_iblock_element` WHERE `IBLOCK_ID` = 48) 
AND `IBLOCK_PROPERTY_ID` = 407
AND `IBLOCK_ELEMENT_ID` IN (SELECT `IBLOCK_ELEMENT_ID` FROM `b_iblock_element_property` WHERE `IBLOCK_ELEMENT_ID` IN (SELECT `ID` FROM `b_iblock_element` WHERE `IBLOCK_ID` = 48) 
AND `IBLOCK_PROPERTY_ID` = 405 AND `VALUE` BETWEEN '%s' AND '%s');";


    public function getDealsByDate ($dateStart, $dateEnd)
    {
        global $connection;
        $sql = sprintf(self::SQL_SELECT_DEAL_FROM_CASH_IN, $dateStart, $dateEnd);
        $stmt = $connection->query($sql);
        $deals = [];
        while ($row = $stmt->fetch())
        {
            $deals[] = $row;
        }
        return $deals;
    }
}
