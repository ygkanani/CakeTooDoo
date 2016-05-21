<h2>Team Accomplishments</h2>
<p>What have you done?</p>
<?= $this->Form->create('Accomplishment') ?>
<?= $this->Form->input('description') ?>
<?= $this->Form->hidden('team_member', array('value' => $this->params['url']['team_member'])) ?>
<?= $this->Form->submit('Post Accomplishment') ?>
</form>

<h2>My Accomplishments</h2>
<?php foreach($my_accomplishments as $accomplishment) : ?>
    <p><strong><?= Sanitize::html($accomplishment['Accomplishment']['description']) ?></strong></p>
    <p><small><?= $time->niceShort($accomplishment['Accomplishment']['created']) ?></small></p>
    <br />
<?php endforeach; ?>

<h2>Other's Accomplishment</h2>
<?php foreach($other_accomplishments as $accomplishment) : ?>
    <p><strong><?= Sanitize::html($accomplishment['Accomplishment']['description']) ?></strong></p>
    <p><small><?= $time->niceShort($accomplishment['Accomplishment']['created']) ?></small></p>
    <br />
<?php endforeach; ?>