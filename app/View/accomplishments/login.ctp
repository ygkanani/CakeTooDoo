<?= $this->Form->create('Accomplishment', array('type' => 'get', 'action' => 'index')) ?>
    <?= $this->Form->input('team_member', array('label' => 'Please enter your name')) ?>
    <?= $this->Form->submit('Login') ?>
</form>