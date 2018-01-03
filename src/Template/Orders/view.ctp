<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
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
<?php if($order):?>
<div class="">
    <h3><?= h($order->id) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $order->has('user') ? $this->Html->link($order->user->name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= h($order->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Good Id') ?></th>
            <td><?= $this->Number->format($order->good_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Num') ?></th>
            <td><?= $this->Number->format($order->num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($order->modified) ?></td>
        </tr>
    </table>
    <?php else: ?>
    空空如也
    <?php endif;?>
</div>
</div>