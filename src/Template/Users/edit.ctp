<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Calculations'), ['controller' => 'Calculations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calculation'), ['controller' => 'Calculations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('user_name');
            echo $this->Form->input('password');
            echo $this->Form->input('title');
            echo $this->Form->input('institutional_affiliation');
            echo $this->Form->input('preferred_language');
            echo $this->Form->input('active_session');
            echo $this->Form->input('os');
            echo $this->Form->input('reset_passwordKey');
            echo $this->Form->input('last_login_date');
            echo $this->Form->input('registration_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
