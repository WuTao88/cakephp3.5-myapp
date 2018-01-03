<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
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
    <h3><?= __('Roles') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('group_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
            <tr>
                <td><?= $this->Number->format($role->id) ?></td>
                <td><?= h($role->name) ?></td>
                <td><?= $role->has('group') ? $this->Html->link($role->group->name, ['controller' => 'Groups', 'action' => 'view', $role->group->id]) : '' ?></td>
                <td><?= h($role->url) ?></td>
                <td><?= h($role->created) ?></td>
                <td><?= h($role->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $role->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $role->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
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