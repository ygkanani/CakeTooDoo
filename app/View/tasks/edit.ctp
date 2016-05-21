<?php echo $this->Form->create('Task');?>
	<fieldset>
	               <legend>Edit Task</legend>
	               <?php
		             echo $this->Form->input('Task.id', array('type' => 'hidden'));
 		             echo $this->Form->input('Task.title');
		             echo $this->Form->input('Task.done');
	                ?>
	 </fieldset>
<?php echo $this->Form->end('Save');?>
<?php echo $this->Html->link('List All Tasks', array('action'=>'index')); ?><br />
<?php echo $this->Html->link('Add Task', array('action'=>'add')); ?>