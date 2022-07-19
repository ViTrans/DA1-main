<?php

class OrderModel extends BaseModel
{

    const TABLE = 'orders';

    public function getALL($select = ['*'], $orderBys = [], $limit)
    {
        return $this->all(self::TABLE, $select, $orderBys, $limit);
    }

    public function index()
    {
        $sql = "SELECT orders.id, orders.time, orders.status, users.name, orders.total_price
        FROM orders, users 
        WHERE users.id = orders.user_id";
        return $this->getByQuery($sql);
    }

    public function index_custom($category_order_id)
    {
        $sql = "SELECT orders.id, orders.time, orders.status, users.name, orders.total_price
        FROM orders, users 
        WHERE users.id = orders.user_id
        and orders.status = ${category_order_id};";
        return $this->getByQuery($sql);
    }



    public function search($id)
    {
        $sql = "SELECT orders.id, orders.time, orders.status, users.name, order_details.total 
        FROM orders, order_details, users 
        WHERE order_details.order_id = orders.id 
        and users.id = orders.user_id 
        and orders.id = ${id}";
        return $this->getByQuery($sql);
    }

    public function update($id, $data)
    {
        return $this->updateMain(self::TABLE, $id, $data);
    }

    public function detailShow($id)
    {
        $sql = "SELECT * FROM orders WHERE id = $id";
        return $this->getQuery($sql);
    }

    public function tableOrder_details($id)
    {
        $sql = "SELECT order_details.quantity, order_details.price, order_details.total, products.name, products.img 
        FROM order_details, products 
        WHERE order_details.product_id = products.id and order_details.order_id =${id}";
        return $this->getByQuery($sql);
    }

    function total_new_orders()
    {
        $sql = "SELECT COUNT(*) AS 'order_new'
        FROM orders WHERE orders.status = 0";
        return $this->getQuery($sql);
    }

    function total_price()
    {
        $sql = "SELECT sum(total_price) as 'total_price' FROM orders";
        return $this->getQuery($sql);
    }
}
