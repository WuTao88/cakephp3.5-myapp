<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Good $good
 */
?>
<div class="columns">
<nav class="col-lg-3 col-md-4 column" id="actions-sidebar">
        <ul class="nav">

            <li><?= $this->Html->link(__('展示商品'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
            <li><?= $this->Html->link(__('新增商品'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
        </ul>
</nav>
<div class="col-lg-9 col-md-8 column content">
    <?= $this->Form->create($good) ?>
    <fieldset>
        <legend><?= __('Add Good') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('code');
            echo $this->Form->control('description');
            echo $this->Form->control('price');
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('store');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>