<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calculations'), ['controller' => 'Calculations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calculation'), ['controller' => 'Calculations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User Name') ?></th>
            <td><?= h($user->user_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($user->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Institutional Affiliation') ?></th>
            <td><?= h($user->institutional_affiliation) ?></td>
        </tr>
        <tr>
            <th><?= __('Preferred Language') ?></th>
            <td><?= h($user->preferred_language) ?></td>
        </tr>
        <tr>
            <th><?= __('Os') ?></th>
            <td><?= h($user->os) ?></td>
        </tr>
        <tr>
            <th><?= __('Reset PasswordKey') ?></th>
            <td><?= h($user->reset_passwordKey) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Login Date') ?></th>
            <td><?= h($user->last_login_date) ?></tr>
        </tr>
        <tr>
            <th><?= __('Registration Date') ?></th>
            <td><?= h($user->registration_date) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Active Session') ?></h4>
        <?= $this->Text->autoParagraph(h($user->active_session)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Calculations') ?></h4>
        <?php if (!empty($user->calculations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Guest Login Id') ?></th>
                <th><?= __('Created Date') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->calculations as $calculations): ?>
            <tr>
                <td><?= h($calculations->id) ?></td>
                <td><?= h($calculations->user_id) ?></td>
                <td><?= h($calculations->guest_login_id) ?></td>
                <td><?= h($calculations->created_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Calculations', 'action' => 'view', $calculations->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Calculations', 'action' => 'edit', $calculations->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Calculations', 'action' => 'delete', $calculations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calculations->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
