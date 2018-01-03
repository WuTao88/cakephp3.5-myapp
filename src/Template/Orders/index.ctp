<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<div class="columns">
<nav class="col-lg-3 col-md-4 column" id="actions-sidebar">
       <ul class="nav">
           <li class="heading"><?= __('功能') ?></li>
           <li><?= $this->Html->link(__('展示用户'), ['controller' => 'Users','action' => 'index']) ?></li>
           <li><?= $this->Html->link(__('新增用户'), ['controller' => 'Users','action' => 'add']) ?></li>
           <li><?= $this->Html->link(__('展示角色'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
           <li><?= $this->Html->link(__('新角色'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
           <li><?= $this->Html->link(__('展示用户类别'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
           <li><?= $this->Html->link(__('新增用户类别'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
           <li><?= $this->Html->link(__('展示购物车'), ['controller' => 'Carts', 'action' => 'index']) ?></li>
           <li><?= $this->Html->link(__('新增购物车'), ['controller' => 'Carts', 'action' => 'add']) ?></li>
           <li><?= $this->Html->link(__('展示商品'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
           <li><?= $this->Html->link(__('新增商品'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
           <li><?= $this->Html->link(__('展示订单'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
           <li><?= $this->Html->link(__('新增订单'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
       </ul>
</nav>
<div class="col-lg-9 col-md-8 column content">
    <h3><?= __('Orders') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('good_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('num') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= $this->Number->format($order->good_id) ?></td>
                <td><?= $order->has('user') ? $this->Html->link($order->user->name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                <td><?= $this->Number->format($order->num) ?></td>
                <td><?= h($order->amount) ?></td>
                <td><?= h($order->created) ?></td>
                <td><?= h($order->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
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
