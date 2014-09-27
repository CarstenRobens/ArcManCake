<?php
class Test {
    public function __construct(Exception $exception) {
        header('Location: /ArcManCake');die();
    }
}