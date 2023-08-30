<?php
//массив Поступлений ДС
class dataArray
{
    public function getDataArray()
    {
        $arCashIn = array(
            "DEALS" => [
                "DEAL_ID_407" => [],
                "DEAL_Name" => [],
                "ElList" => [
                    "ElList_ID" => [],
                    "ElList_ZnO_ID" => [],
                    "ElList_Params" => [
                        "ElList_TITLE" => [],
                        "ElList_NAME" => [],
                        "ElList_Currency" => [],
                        "Date_Plan_405" => [],
                        "Sum_Plan_522" => [],
                        "Date_Fakt_410" => [],
                        "Sum_Ratio" => [],
                        "Sum_Fakt_588" => [],
                        "ElList_TOTAL_SUM_PLAN" => [],
                        "ElList_TOTAL_SUM_FAKT" => []
                    ],
                    "DEAL_ID_Kontragent" => [],
                    "DEAL_Kontragent_NAME" => [],
                    "DEAL_TOTAL_SUM_PLAN" => 0,
                    "DEAL_TOTAL_SUM_FAKT" => 0
                ]
            ],
            "Total_Sum_Plan" => 0,
            "Total_Sum_Fakt" => 0
        );
        $Total_Sum_Plan = 0;
        $Total_Sum_Fakt = 0;

        $connection = \Bitrix\Main\Application::getConnection();
        #ElList_ID
        $sql = $connection->Query("SELECT biep.IBLOCK_ELEMENT_ID 
    FROM b_iblock_element_property biep 
    WHERE `IBLOCK_ELEMENT_ID` IN (SELECT `ID` FROM `b_iblock_element` WHERE `IBLOCK_ID` = 48)
    AND `IBLOCK_PROPERTY_ID` = 407  
    AND `IBLOCK_ELEMENT_ID` IN (SELECT `IBLOCK_ELEMENT_ID` FROM `b_iblock_element_property` WHERE `IBLOCK_ELEMENT_ID` IN (SELECT `ID` FROM `b_iblock_element` WHERE `IBLOCK_ID` = 48)
    AND `IBLOCK_PROPERTY_ID` = 405 AND `VALUE` BETWEEN '2023-01-01' AND '2023-08-24') ORDER BY `IBLOCK_ELEMENT_ID` ASC;");

        foreach ($sql as $row) {
            $arCashIn['DEALS']['ElList']['ElList_ID'][] = $row['IBLOCK_ELEMENT_ID'];
            $arCashIn['DEALS']['ElList']['ElList_Params']['ElList_TITLE'][] = "Поступления ДС";
        }

        #ElList_NAME
        $ElList_ID = implode(",", $arCashIn['DEALS']['ElList']['ElList_ID']);
        $sql = $connection->Query("SELECT `NAME` 
    FROM `b_iblock_element` 
    WHERE `ID` IN (" . $ElList_ID . ") 
    ORDER BY `ID` ASC");
        foreach ($sql as $row) {
            $arCashIn['DEALS']['ElList']['ElList_Params']['ElList_NAME'][] = $row['NAME'];
        }

        #DEAL_ID_407
        $sql = $connection->Query("SELECT `IBLOCK_ELEMENT_ID`,`VALUE` 
    FROM `b_iblock_element_property` 
    WHERE `IBLOCK_ELEMENT_ID` IN (" . $ElList_ID . ") 
    AND `IBLOCK_PROPERTY_ID` = 407
    ORDER BY `IBLOCK_ELEMENT_ID` ASC");

        foreach ($sql as $row) {
            $arCashIn['DEALS']['DEAL_ID_407'][] = $row['VALUE'];

        }

        #Date_Plan_405
        $sql = $connection->Query("SELECT `IBLOCK_ELEMENT_ID`,`VALUE` 
    FROM `b_iblock_element_property` 
    WHERE `IBLOCK_ELEMENT_ID` IN (" . $ElList_ID . ") 
    AND `IBLOCK_PROPERTY_ID` = 405
    ORDER BY `IBLOCK_ELEMENT_ID` ASC");

        foreach ($sql as $row) {
            $arCashIn['DEALS']['ElList']['ElList_Params']['Date_Plan_405'][] = $row['VALUE'];

        }

        #Sum_Plan_522
        $sql = $connection->Query("SELECT `IBLOCK_ELEMENT_ID`,`VALUE` 
    FROM `b_iblock_element_property` 
    WHERE `IBLOCK_ELEMENT_ID` IN (" . $ElList_ID . ") 
    AND `IBLOCK_PROPERTY_ID` = 522
    ORDER BY `IBLOCK_ELEMENT_ID` ASC");
        $ElList_TOTAL_SUM_PLAN = 0;
        foreach ($sql as $row) {
            $arCashIn['DEALS']['ElList']['ElList_Params']['Sum_Plan_522'][] = $row['VALUE'];
            $ElList_TOTAL_SUM_PLAN = $ElList_TOTAL_SUM_PLAN + $row['VALUE'];
        }
        $arCashIn['Total_Sum_Plan'] = ++$ElList_TOTAL_SUM_PLAN;

        #Date_Fakt_410
        foreach ($arCashIn['DEALS']['ElList']['ElList_ID'] as $El_ID) {

            $sql = $connection->Query("SELECT `IBLOCK_ELEMENT_ID`,`VALUE` 
    FROM `b_iblock_element_property` 
    WHERE `IBLOCK_ELEMENT_ID` IN (" . $El_ID . ") 
    AND `IBLOCK_PROPERTY_ID` = 410
    ORDER BY `IBLOCK_ELEMENT_ID` ASC");
            $row = $sql->fetch();
            //    var_dump($num_rows);
            if ($row == NULL) {
                $arCashIn['DEALS']['ElList']['ElList_Params']['Date_Fakt_410'][] = "";
            } else {
                $arCashIn['DEALS']['ElList']['ElList_Params']['Date_Fakt_410'][] = $row['VALUE'];
            }
        }

        #Sum_Fakt_588
        $ElList_TOTAL_SUM_FAKT = 0;
        foreach ($arCashIn['DEALS']['ElList']['ElList_ID'] as $El_ID) {

            $sql = $connection->Query("SELECT `IBLOCK_ELEMENT_ID`,`VALUE` 
    FROM `b_iblock_element_property` 
    WHERE `IBLOCK_ELEMENT_ID` IN (" . $El_ID . ") 
    AND `IBLOCK_PROPERTY_ID` = 588
    ORDER BY `IBLOCK_ELEMENT_ID` ASC");

            $row = $sql->fetch();
            if ($row == NULL) {
                $arCashIn['DEALS']['ElList']['ElList_Params']['Sum_Fakt_588'][] = 0;
            } else {
                $arCashIn['DEALS']['ElList']['ElList_Params']['Sum_Fakt_588'][] = $row['VALUE'];
                $ElList_TOTAL_SUM_FAKT = $ElList_TOTAL_SUM_FAKT + $row['VALUE'];
            }
        }
        $arCashIn['Total_Sum_Fakt'] = ++$ElList_TOTAL_SUM_FAKT;

        #DEAL_Name, DEAL_ID_Kontragent
        foreach ($arCashIn['DEALS']['DEAL_ID_407'] as $DEAL_ID) {
            $sql = $connection->Query("SELECT `TITLE`,`COMPANY_ID` FROM `b_crm_deal` WHERE `ID` = $DEAL_ID;");
            $row = $sql->fetch();
            //    var_dump($num_rows);
            if ($row == NULL) {
                $arCashIn['DEALS']['DEAL_Name'][] = "";
                $arCashIn['DEALS']['ElList']['DEAL_ID_Kontragent'][] = "";
            } else {
                $arCashIn['DEALS']['DEAL_Name'][] = $row['TITLE'];
                if ($row['COMPANY_ID']) {
                    $arCashIn['DEALS']['ElList']['DEAL_ID_Kontragent'][] = $row['COMPANY_ID'];
                } else {
                    $arCashIn['DEALS']['ElList']['DEAL_ID_Kontragent'][] = "";
                }
            }
        }

        #DEAL_Kontragent_NAME
        foreach ($arCashIn['DEALS']['ElList']['DEAL_ID_Kontragent'] as $COMPANY_ID) {
            $sql = $connection->Query("SELECT `TITLE` FROM `b_crm_company` WHERE `ID` = $COMPANY_ID;");
            $row = $sql->fetch();
            //    var_dump($num_rows);
            if ($row == NULL) {
                $arCashIn['DEALS']['ElList']['DEAL_Kontragent_NAME'][] = "";
            } else {
                $arCashIn['DEALS']['ElList']['DEAL_Kontragent_NAME'][] = $row['TITLE'];
            }
        }
        return $arCashIn;
    }
}
$arData = new dataArray();
$a = $arData->getDataArray();
echo '<pre>';
print_r($a);
echo '</pre>';
?>
