<?php

class WebServiceController extends controller {
    public function filters()
    {
            return array(
                'accessControl', // perform access control for CRUD operations
                array(
                    'ext.starship.RestfullYii.filters.ERestFilter +
                    REST.GET, REST.PUT, REST.POST, REST.DELETE, REST.HELLO, REST.CALCULATOR'
                ),
            );
    }

    public function actions()
    {
            return array(
                'REST.'=>'ext.starship.RestfullYii.actions.ERestActionProvider',
            );
    }

    public function accessRules()
    {
            return array(
                array('allow', 'actions'=>array('REST.GET', 'REST.PUT', 'REST.POST', 'REST.DELETE', 'REST.HELLO', 'REST.CALCULATOR'),
                'users'=>array('*'),
                ),
                array('deny',  // deny all users
                    'users'=>array('*'),
                ),
            );
    }

    /**
    * Retorna um hello world!
    * return string
    */
    public function helloWorld() {
        return "Hello World!";
    }

    /**
    * Calculator!
    * @param string $operation
    * @param float $num1
    * @param float $num2
    * @return float $result
    */
    public function calculator($operation, $num1, $num2) {
        $result = 0;
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

        return $result;
    }
}
