<!DOCTYPE html>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?='朝霞店' ?>-
<?= $this->fetch('title') ?>
    </title>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <?= $this->Html->css('spectre/spectre.min.css') ?>
    <?= $this->Html->css('spectre/spectre-exp.min.css') ?>
    <?= $this->Html->css('spectre/spectre-icons.min.css') ?>

</head>
<header class="navbar">
  <section class="navbar-section">
    <a href="#" class="navbar-brand mr-2"><?= $this->fetch('title') ?></a>
    <a href="/" class="btn btn-link">首页</a>
 <div class="dropdown">
      <a href="#" class="btn btn-link dropdown-toggle" tabindex="0">
        消息<i class="icon icon-caret"></i>
      </a>
      <!-- menu component -->
      <ul class="menu">
        <li><a href="#" class="btn btn-link">查看消息</a></li>

      <li><a href="#" class="btn btn-link">发消息</a></li>
      </ul>
    </div>
  </section>
  <section class="navbar-center">
  </section>
  <section class="navbar-section">

  <?= $this->Html->link('我的订单',['controller'=>'orders','action'=>'index'],['class'=>"btn btn-link"])  ?>
      <a href="#" class="btn btn-link">我的收藏</a>
        <?= $this->Html->link('购物车',['controller'=>'carts','action'=>'index'],['class'=>"btn btn-link"])  ?>
    <?php if ($this->get('name')): ?>

    <div class="dropdown">
      <a href="#" class="btn btn-link dropdown-toggle" tabindex="0">
        <?= $this->get('name') ?><i class="icon icon-caret"></i>
      </a>
      <!-- menu component -->
      <ul class="menu">
        <li><a href="/users/logout" class="btn btn-link">登出</a></li>
         <li><?= $this->Html->link('账户',['controller'=>'users','action'=>'view',$user->id],['class'=>"btn btn-link"])  ?></li>
      <li><a href="#" class="btn btn-link">消息</a></li>
      </ul>
    </div>

    <?php else:?>
  <a href="/users/login" class="btn btn-link">亲，登录</a>
  <a href="/users/register" class="btn btn-link">免费注册</a>
    <?php endif; ?>


  </section>
</header>

<div id="msg" class="toast toast-primary">
 <?= $this->Flash->render() ?>
  <button onclick="$('#msg').remove()" class="btn btn-clear "></button>
</div>


<div class="container">

        <?= $this->fetch('content') ?>

    </div>
    <footer align="center">
CopyRight &copy; 朝霞店
    </footer>
</body>
</html>