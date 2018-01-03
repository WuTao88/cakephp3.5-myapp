<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="columns">
<nav class="col-lg-3 col-md-4 column" id="actions-sidebar">
    <ul class="nav">
        <li class="heading"><?= __('功能') ?></li>
        <li>
            <div class="dropdown">
              <a href="#" class="btn btn-link dropdown-toggle" tabindex="0">
                用户<i class="icon icon-caret"></i>
              </a>
              <!-- menu component -->
              <ul class="menu">
               <li><?= $this->Html->link(__('查看用户'), ['controller' => 'Users','action' => 'index']) ?></li>
                       <li><?= $this->Html->link(__('新增用户'), ['controller' => 'Users','action' => 'add']) ?></li>
              </ul>
            </div>
        </li>
        <li>
            <div class="dropdown">
              <a href="#" class="btn btn-link dropdown-toggle" tabindex="0">
                角色<i class="icon icon-caret"></i>
              </a>
              <ul class="menu">
              <li><?= $this->Html->link(__('查看角色'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
              <li><?= $this->Html->link(__('新增角色'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
              </ul>
            </div>
        </li>
        <li>
            <div class="dropdown">
              <a href="#" class="btn btn-link dropdown-toggle" tabindex="0">
                用户类型<i class="icon icon-caret"></i>
              </a>
              <ul class="menu">
                <li><?= $this->Html->link(__('查看用户类型'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('新增用户类型'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
              </ul>
            </div>
        </li>
        <li>
            <div class="dropdown">
              <a href="#" class="btn btn-link dropdown-toggle" tabindex="0">
                商品<i class="icon icon-caret"></i>
              </a>
              <ul class="menu">
               <li><?= $this->Html->link(__('展示商品'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
               <li><?= $this->Html->link(__('新增商品'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
              </ul>
            </div>
        </li>
</nav>
<div class="col-lg-9 col-md-8 column content">
    <h3><?= __('Users') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->name) ?></td>
                <td><?= h($user->phone) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                <td><?= $user->has('group') ? $this->Html->link($user->group->name, ['controller' => 'Groups', 'action' => 'view', $user->group->id]) : '' ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
</div>