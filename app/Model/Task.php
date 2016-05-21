
<?php

class Task extends AppModel
{
	var $name = 'Task';
	var $validate = array('title' => array('rule' => array('validateTitle'), 'message' => 'Title of a task cannot be empty and special characters are not allowed'));

	function validateTitle($data) {
		return (preg_match('/^[a-zA-Z0-9 ]+$/', $data['title']));
	}

	function findDataById($id = null) {
		$data = $this->find('first', array('conditions' => array('id' => $id)));
		if ($data) {
			return $data;
		} else {
			throw new NotFoundException('Record not found!');
		}
	}

	function findDoneTasks() {
		return $this->find('all', array('conditions' => array('Task.done' => '1')));
	}

	function findPendingTasks() {
		return $this->find('all', array('conditions' => array('Task.done' => '0')));
	}

	function findAllTasks() {
		return $this->find('all');
	}

	function prepare() {  // function to prepare the task model to add or edit data
		$this->create();
	}

	function saveData($data = null) {
		//var_dump($data);
		if($data) {
			if ($this->save($data)) {
				return true;
			} else {
				throw new InternalErrorException('Data is not saved. Try again!');
			}
		} else {
			throw new InternalErrorException('No Data to Save!');
		}
	}

	function deleteDataById($id=null) {
		if($id) {
			if ($this->delete($id)) {
				return true;
			} else {
				throw new MethodNotAllowedException('Record is not found!');
			}
		} else {
			throw new MethodNotAllowedException('No ID found!');
		}
	}
}
?>
