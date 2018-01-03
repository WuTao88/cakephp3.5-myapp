<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
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
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Edit Order') ?></legend>
        <?php
            echo $this->Form->control('good_id');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('num');
            echo $this->Form->control('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
