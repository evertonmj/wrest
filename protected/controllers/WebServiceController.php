<?php

class WebServiceController extends Controller {
    public function filters()
    {
            return array(
                'accessControl', // perform access control for CRUD operations
                array(
                    'ext.starship.RestfullYii.filters.ERestFilter +
                    REST.GET, REST.PUT, REST.POST, REST.DELETE, helloWorld, calculator'
                ),
            );
    }

    public function actions()
    {
            return array(
                'REST.'=>'ext.starship.RestfullYii.actions.ERestActionProvider',
                'helloWorld' => 'ext.starship.RestfullYii.actions.ERestActionProvider',
                'calculator' => 'ext.starship.RestfullYii.actions.ERestActionProvider',
            );
    }

    /**
    * Retorna um hello world!
    * return string
    */
    public function actionHelloWorld() {
        echo CJSON::encode(array("result"=>"Hello World!"));
        Yii::app()->end();
    }

    /**
    * Calculator!
    * @param string $operation
    * @param float $num1
    * @param float $num2
    * @return float $result
    */
    public function actionCalculator($operation, $num1, $num2) {
        $result = "null";
        if($operation === "SUM") {
            $result = $num1 + $num2;
        } else if($operation === "MULT") {
            $result = $num1 * $num2;
        } else if($operation === "SUB") {
            $result = $num1 - $num2;
        } else if($operation === "DIV") {
            if($num2 > 0 ) {
                $result = $num1 / $num2;
            }
        }
        echo CJSON::encode(array("result"=>$result));
        Yii::app()->end();
    }
}
