<?php

class CashFlowController {
    public function actionIndex () {
            $v = new CashFlowView();
            $result = $v->render('index.html');
            echo $result;
    }

    public function actionGetListByDate ($datePeriod) {

    }

}
