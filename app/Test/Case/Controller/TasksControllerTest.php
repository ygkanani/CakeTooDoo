<?php

App::uses('AppController','Controller');

class TasksControllerTest extends ControllerTestCase {
    public $fixtures = array('app.task');

    public function testIndex() {
        $result = $this->_testAction('/tasks/index');
        //debug($result);
    }

}