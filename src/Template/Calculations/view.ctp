<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calculation'), ['action' => 'edit', $calculation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calculation'), ['action' => 'delete', $calculation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calculation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calculations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calculation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Guest Logins'), ['controller' => 'Guestlogins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Guest Login'), ['controller' => 'Guestlogins', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="calculations view large-9 medium-8 columns content">
    <h3><?= h($calculation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $calculation->has('user') ? $this->Html->link($calculation->user->title, ['controller' => 'Users', 'action' => 'view', $calculation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Guest Login') ?></th>
            <td><?= $calculation->has('guest_login') ? $this->Html->link($calculation->guest_login->id, ['controller' => 'Guestlogins', 'action' => 'view', $calculation->guest_login->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($calculation->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created Date') ?></th>
            <td><?= h($calculation->created_date) ?></tr>
        </tr>
    </table>
</div>
