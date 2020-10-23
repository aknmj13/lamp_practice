<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入履歴</title>
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
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($histories as $history){ ?>
            <tr>
            <td><?php print($history['order_id']); ?></td>
            <td><?php print($history['createdate']); ?></td>
            <td><?php print(number_format($history['total_price'])); ?>円</td>
            <td><a href="<?php print ORDER_DETAILS_URL.'?id='.$history['order_id']; ?>">購入明細表示</a></td>
            
            </tr>
            <?php }; ?>
        </tbody>
    </table>
</body>
</html>