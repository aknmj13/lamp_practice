CREATE TABLE `order_history` (
    `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '注文番号',
    `user_id` int(11) NOT NULL COMMENT 'usersテーブルのユーザーID',
    `createdate` datetime NOT NULL COMMENT '購入日時',
    PRIMARY KEY(order_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `order_details` (
    `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '注文明細ID',
    `order_id` int(11) NOT NULL COMMENT 'order_historyテーブルの注文番号',
    `item_id` int(11) NOT NULL COMMENT 'itemsテーブルの商品ID',
    `price` int(11) NOT NULL COMMENT '注文完了時の商品価格',
    `amount` int(11) NOT NULL COMMENT '購入数',
    PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;