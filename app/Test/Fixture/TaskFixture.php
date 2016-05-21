<?php

class TaskFixture extends CakeTestFixture {
    public $useDbConfig = 'test';
    public $fields = array (
        'id' => array('type' => 'integer', 'key' => 'primary'),
        'title' => array('type' => 'string', 'length' => 255, 'null' => false),
        'done' => array('type' => 'boolean'),
        'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
        'modified' => array('type' => 'datetime', 'null' => true, 'default' => null)
    );

    public $records = array(
        array(
            'id' => 1,
            'title' => 'First task',
            'done' => 1,
            'created' => '2007-03-18 10:39:23',
            'modified' => '2007-03-18 10:41:31'
        ),
        array(
            'id' => 2,
            'title' => 'Second task',
            'done' => 0,
            'created' => '2016-01-18 10:39:23',
            'modified' => '2016-02-18 10:41:31'
        ),
        array(
            'id' => 3,
            'title' => 'Third task',
            'done' => 0,
            'created' => '2009-03-18 10:39:23',
            'modified' => '2010-03-18 10:41:31'
        ),
        array(
            'id' => 4,
            'title' => '   ',
            'done' => 1,
            'created' => '2009/03/18 10:39:23',
            'modified' => '2010-03-18 10:41:31'
        )
    );

}