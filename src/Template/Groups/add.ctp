<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Group $group
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
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('Add Group') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
