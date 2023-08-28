<?php
// ToDo Подключить autoloader
require_once('app/view/CashFlowView.php');
var_dump(__DIR__ . '/../../model/CashFlowModel.php');
require_once (__DIR__ . '/../../model/CashFlowModel.php');


class CashFlowController {
    public function actionIndex () {
            $v = new CashFlowView();
            $result = $v->render('index.html');
            echo $result;
    }

    public function actionGetListByDate ($date) {
        $model = new DealFromCashInModel();

    }
}
