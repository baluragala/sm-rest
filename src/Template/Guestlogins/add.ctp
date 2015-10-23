<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Guestlogins'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="guestlogins form large-9 medium-8 columns content">
    <?= $this->Form->create($guestlogin) ?>
    <fieldset>
        <legend><?= __('Add Guestlogin') ?></legend>
        <?php
            echo $this->Form->input('login_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
