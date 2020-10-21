<?php

function get_users_history($db, $user_id){
    $sql = "
        SELECT
            order_history.order_id,
            order_history.createdate,
            COUNT(order_details.order_id),
            SUM(order_details.price * order_details.amount) AS total_price
        FROM order_history
        INNER JOIN order_details
        ON order_history.order_id = order_details.order_id
        WHERE order_history.user_id = :user_id
        GROUP BY order_id
        ORDER BY order_id DESC";

    return fetch_all_query($db, $sql, array(':user_id' => $user_id));
}

function get_all_history($db){
    $sql = "
        SELECT
            order_history.order_id,
            order_history.createdate,
            COUNT(order_details.order_id),
            SUM(order_details.price * order_details.amount) AS total_price
        FROM order_history
        INNER JOIN order_details
        ON order_history.order_id = order_details.order_id
        GROUP BY order_id
        ORDER BY order_id DESC";

    return fetch_all_query($db, $sql);
}

function get_order_history($db){
    $user = get_login_user($db);
    if(is_admin($user)){
        return get_all_history($db);
    }else{
        return get_users_history($db, $user['user_id']);
    }
}

function get_a_history($db, $order_id){
    $sql = "
        SELECT
            order_history.order_id,
            order_history.createdate,
            COUNT(order_details.order_id),
            SUM(order_details.price * order_details.amount) AS total_price
        FROM order_history
        INNER JOIN order_details
        ON order_history.order_id = order_details.order_id
        WHERE order_history.order_id = :order_id
        GROUP BY order_id";

    return fetch_all_query($db, $sql, array(':order_id' => $order_id));
}

function get_order_details($db, $order_id){
    $sql = "
        SELECT
            order_details.item_id,
            order_details.price,
            order_details.amount,
            items.name
        FROM order_details
        INNER JOIN items
        ON order_details.item_id = items.item_id
        WHERE order_details.order_id = :order_id
            ";
    return fetch_all_query($db, $sql, array(':order_id' => $order_id));
}

function get_subtotal($order_detail){
    $subtotal = $order_detail['price'] * $order_detail['amount'];
    
    return $subtotal;
}