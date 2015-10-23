<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $calculation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $calculation->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Calculations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Guest Logins'), ['controller' => 'Guestlogins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Guest Login'), ['controller' => 'Guestlogins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calculations form large-9 medium-8 columns content">
    <?= $this->Form->create($calculation) ?>
    <fieldset>
        <legend><?= __('Edit Calculation') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('guest_login_id', ['options' => $guestLogins, 'empty' => true]);
            echo $this->Form->input('created_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
