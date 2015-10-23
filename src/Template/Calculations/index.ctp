<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calculation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Guest Logins'), ['controller' => 'Guestlogins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Guest Login'), ['controller' => 'Guestlogins', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calculations index large-9 medium-8 columns content">
    <h3><?= __('Calculations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('guest_login_id') ?></th>
                <th><?= $this->Paginator->sort('created_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calculations as $calculation): ?>
            <tr>
                <td><?= $this->Number->format($calculation->id) ?></td>
                <td><?= $calculation->has('user') ? $this->Html->link($calculation->user->title, ['controller' => 'Users', 'action' => 'view', $calculation->user->id]) : '' ?></td>
                <td><?= $calculation->has('guest_login') ? $this->Html->link($calculation->guest_login->id, ['controller' => 'Guestlogins', 'action' => 'view', $calculation->guest_login->id]) : '' ?></td>
                <td><?= h($calculation->created_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $calculation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calculation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $calculation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calculation->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
