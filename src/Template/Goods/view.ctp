<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Good $good
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
    <h3><?= h($good->name) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($good->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Code') ?></th>
            <td><?= h($good->code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($good->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= h($good->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $good->has('user') ? $this->Html->link($good->user->name, ['controller' => 'Users', 'action' => 'view', $good->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($good->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Store') ?></th>
            <td><?= $this->Number->format($good->store) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($good->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($good->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Carts') ?></h4>
        <?php if (!empty($good->carts)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Code') ?></th>
                <th scope="col"><?= __('Good Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Num') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($good->carts as $carts): ?>
            <tr>
                <td><?= h($carts->id) ?></td>
                <td><?= h($carts->code) ?></td>
                <td><?= h($carts->good_id) ?></td>
                <td><?= h($carts->user_id) ?></td>
                <td><?= h($carts->num) ?></td>
                <td><?= h($carts->created) ?></td>
                <td><?= h($carts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Carts', 'action' => 'view', $carts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Carts', 'action' => 'edit', $carts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Carts', 'action' => 'delete', $carts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $carts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Orders') ?></h4>
        <?php if (!empty($good->orders)): ?>
        <table class="table" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Good Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Num') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($good->orders as $orders): ?>
            <tr>
                <td><?= h($orders->id) ?></td>
                <td><?= h($orders->good_id) ?></td>
                <td><?= h($orders->user_id) ?></td>
                <td><?= h($orders->num) ?></td>
                <td><?= h($orders->amount) ?></td>
                <td><?= h($orders->created) ?></td>
                <td><?= h($orders->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Orders', 'action' => 'view', $orders->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Orders', 'action' => 'edit', $orders->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Orders', 'action' => 'delete', $orders->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orders->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>