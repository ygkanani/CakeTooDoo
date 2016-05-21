<?php

App::uses('Task','Model');

class TaskTest extends CakeTestCase {
    public $fixtures = array('app.task');

    public function setUp()
    {
        parent::setUp();
        $this->Task = ClassRegistry::init('Task');
    }

    /**
     * @covers Task::saveData
     *
     *
     */


    public function testTrueSaveData() {
        $data = array(
                    'title' => 'new data',
                    'done' => 0
            );
       // $result = false;
        $result = $this->Task->saveData($data);
        $this->assertTrue($result);
    }

    public function testFalseSaveData() {
        $data = array(
            array(
                'title' => '12345',
                'done' => 0
            ), array(
                'title' => '   ',
                'done' => 1
            )
        );

        $result = false;
        if($this->Task->saveData($data[0])) {
            $result = true;
        }
        $this->assertTrue($result,'title can not consist only numbers!');

        $result = false;
        if($this->Task->saveData($data[1])) {
            $result = true;
        }
        $this->assertTrue($result,'title can not consist only apaces!');

    }

    /**
     * @expectedException     InternalErrorException
     *
     */
    public function testSaveEmptyData(){
        $this->Task->saveData();
    }

    /**
     * @expectedException     InternalErrorException
     *
     */
    public function tetSaveInvalidData() {
        $data = array(
            'title' => 1234,
            'done' => 'abd'
        );
        $this->Task->saveData($data);
    }
    /**
     * @covers Task::deleteDataById
     * @expectedException     MethodNotAllowedException
     *
     */

    public function testFalseDeleteData() {
        $result = false;
        if($this->Task->deleteDataById()){
            $result = true;
        }
        //$this->setExpectedException('MethodNotAllowedException','No ID found!');
        $result = false;
        if($this->Task->deleteDataById('45')){
            $result = true;
        }
        //$this->setExpectedException('MethodNotAllowedException','Record is not found!');
    }

    public function testTrueDeleteData() {
        $result = false;
        if($this->Task->deleteDataById('2')){
            $result = true;
        }
        $this->assertTrue($result,'record #2 deleted!');
    }

    /**
     * @expectedException MethodNotAllowedException
     */
    public function testDeleteInvalidData() {
        $result = false;
        if($this->Task->deleteDataById('abcd')) {
            $result = true;
        }
    }

    public function testValidateTitle() {
        $result = $this->Task->validateTitle(array('title' => '12@#45', 'done' => false));
        $this->assertEquals(0,$result);
    }

    /**
     * @covers Task::findDataById
     * @expectedException     NotFoundException
     *
     */

    public function testFalseFindById() {
        $this->Task->findDataById();
        $this->Task->findDataById(10);
    }

    public function testTrueFindById() {
        $result = false;
        if($this->Task->findById(2)) {
            $result = true;
        }
        $this->assertTrue($result,'record #2 found');
        $result = false;
        if($this->Task->findById(4)) {
            $result = true;
        }
        $this->assertTrue($result,'record #4 found');
    }

    public function testFindDoneTasks() {
        $result = $this->Task->findDoneTasks();
        $expected = array(
            array(
                'Task' => array(
                    'id' => 1,
                    'title' => 'First task',
                    'done' => 1,
                    'created' => '2007-03-18 10:39:23',
                    'modified' => '2007-03-18 10:41:31'
                )
            ),
            array(
                'Task' => array(
                    'id' => 4,
                    'title' => '   ',
                    'done' => 1,
                    'created' => '2009-03-18 10:39:23',
                    'modified' => '2010-03-18 10:41:31'
                )
            ));
        $this->assertEquals($expected,$result);
    }

    public function testFindPendingTasks() {
        $result = $this->Task->findPendingTasks();
        $expected = array(
            array(
                'Task' => array(
                    'id' => 2,
                    'title' => 'Second task',
                    'done' => 0,
                    'created' => '2016-01-18 10:39:23',
                    'modified' => '2016-02-18 10:41:31'
                )
            ),
            array(
                'Task' => array(
                    'id' => 3,
                    'title' => 'Third task',
                    'done' => 0,
                    'created' => '2009-03-18 10:39:23',
                    'modified' => '2010-03-18 10:41:31'
                )
            ));
        $this->assertEquals($expected,$result);
    }

    public function testFindAllTasks() {
        $result = $this->Task->findAllTasks();
        $expected = array(
            array(
                'Task' => array(
                    'id' => 1,
                    'title' => 'First task',
                    'done' => 1,
                    'created' => '2007-03-18 10:39:23',
                    'modified' => '2007-03-18 10:41:31'
                )
            ),
            array(
                'Task' => array(
                    'id' => 2,
                    'title' => 'Second task',
                    'done' => 0,
                    'created' => '2016-01-18 10:39:23',
                    'modified' => '2016-02-18 10:41:31'
                )
            ),
            array(
                'Task' => array(
                    'id' => 3,
                    'title' => 'Third task',
                    'done' => 0,
                    'created' => '2009-03-18 10:39:23',
                    'modified' => '2010-03-18 10:41:31'
                )
            ),
            array(
                'Task' => array(
                    'id' => 4,
                    'title' => '   ',
                    'done' => 1,
                    'created' => '2009-03-18 10:39:23',
                    'modified' => '2010-03-18 10:41:31'
                )
            ));
        $this->assertEquals($expected,$result);
    }

//    public function testPrepare() {
//        $this->assertTrue($this->Task->prepare());
//    }
}
