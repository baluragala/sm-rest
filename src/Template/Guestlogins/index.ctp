<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Guestlogin'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="guestlogins index large-9 medium-8 columns content">
    <h3><?= __('Guestlogins') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('login_date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($guestlogins as $guestlogin): ?>
            <tr>
                <td><?= $this->Number->format($guestlogin->id) ?></td>
                <td><?= h($guestlogin->login_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $guestlogin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $guestlogin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $guestlogin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $guestlogin->id)]) ?>
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
