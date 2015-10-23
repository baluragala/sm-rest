<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Guestlogin'), ['action' => 'edit', $guestlogin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Guestlogin'), ['action' => 'delete', $guestlogin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $guestlogin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Guestlogins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Guestlogin'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="guestlogins view large-9 medium-8 columns content">
    <h3><?= h($guestlogin->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($guestlogin->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Login Date') ?></th>
            <td><?= h($guestlogin->login_date) ?></tr>
        </tr>
    </table>
</div>
