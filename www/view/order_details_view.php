<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'admin.css'); ?>">
</head>
<body>
    <?php 
    include VIEW_PATH . 'templates/header_logined.php'; 
    ?>
    <table class="table table-bordered text-center">
        <thead class="thead-light">
            <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>注文の合計金額</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td><?php print($history[0]['order_id']); ?></td>
            <td><?php print($history[0]['createdate']); ?></td>
            <td><?php print(number_format($history[0]['total_price'])); ?>円</td>            
            </tr>
        </tbody>
    </table>
    <h2>注文明細</h2>
    <table class="table table-bordered text-center">
        <thead class="thead-light">
            <tr>
            <th>商品名</th>
            <th>商品価格</th>
            <th>購入数</th>
            <th>小計</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($order_details as $order_detail){ ?>
            <tr>
            <td><?php print($order_detail['name']); ?></td>
            <td><?php print($order_detail['price']); ?></td>
            <td><?php print($order_detail['amount']); ?></td>
            <td><?php print(number_format(get_subtotal($order_detail))); ?>円</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>