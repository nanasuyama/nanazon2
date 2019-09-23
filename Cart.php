<?php

require_once 'Config.php';

class Cart extends Config
{
//Save to a cart
    public function saveCart($item_id, $user_id, $item_quantity, $item_price)
    {

        $sql = "SELECT * FROM carts WHERE user_id = $user_id AND cart_status = 'available'";
        $result_cart = $this->conn->query($sql);

        if ($result_cart->num_rows == 0) { //if cart does not exist
            $sql = "INSERT INTO carts(user_id, cart_status)
                VALUES ('$user_id', 'available')";

            $result = $this->conn->query($sql);

            if ($result) {
                $cart_id = $this->conn->insert_id; //get the last inserted primary key (id)

                $insert_item = $this->saveCartItem($cart_id, $item_id, $item_quantity, $item_price);

                if ($insert_item) {
                    $update_item = $this->updateItemQuantity($item_id, $item_quantity);
                    if ($update_item) {
                        $this->redirect('cart.php');
                    }
                }
            } else {
                echo "ERROR" . $this->conn->error;
            }
        } elseif ($result_cart->num_rows == 1) { //if cart exist
            $row = $result_cart->fetch_assoc();
            $cart_id = $row['cart_id']; //find car_id
            $insert_item = $this->saveCartItem($cart_id, $item_id, $item_quantity, $item_price);
            if ($insert_item) {
                $update_item = $this->updateItemQuantity($item_id, $item_quantity);
                if ($update_item) {
                    $this->redirect('cart.php');
                }
            }
        }
    }

    public function saveCartItem($cart_id, $item_id, $item_quantity, $item_price)
    {
        echo $item_price;
        echo $item_quantity;
        $ci_price = $item_price * $item_quantity;
        $sql = "INSERT INTO cart_items(cart_id, item_id, ci_quantity, ci_price)
                    VALUES('$cart_id', '$item_id', '$item_quantity', '$ci_price')";

        $result = $this->conn->query($sql);

        if ($result) {
            return true;
        } else {
            echo "ERROR" . $this->conn->error;
        }
    }

    public function updateItemQuantity($item_id, $item_quantity)
    {
        $sql = "SELECT * FROM items WHERE item_id = $item_id"; //to get the current data of the item
        $result = $this->conn->query($sql);

        if ($result) {
            $row = $result->fetch_assoc();
            $new_quantity = $row['item_quantity'] - $item_quantity;
            //$row['item_quantity'] (from database) - $item_quantity(from from);

            $sql = "UPDATE items SET item_quantity = '$new_quantity'
                    WHERE item_id = $item_id";

            $result = $this->conn->query($sql);

            if ($result) {
                return true;
            } else {
                echo "ERROR";
            }
        } elseif ($this->conn->error) {
            echo "ERROR";
        }
    }

    public function selectCartItems($user_id)
    {
        // Get the cart item first

        $sql = "SELECT * FROM carts WHERE user_id = $user_id AND cart_status = 'available'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) { // Check if there is 1 result
            $row = $result->fetch_assoc(); // Get the result data
            $cart_id = $row['cart_id']; // Get the id

            $sql = "SELECT * FROM cart_items
                        INNER JOIN items ON  cart_items.item_id = items.item_id
                        WHERE cart_items.cart_id = $cart_id";
            $result = $this->conn->query($sql); // Run or execute query

            if ($result->num_rows > 0) { // Check if there are results
                $rows = array(); // Create an empty array
                while ($row = $result->fetch_assoc()) { // Get the result data
                    $rows[] = $row; // Populate rows with every row data from the db
                }
                return $rows; // Return the populated
            } else {
                echo "Oh Snap! There are no items in your cart.";
                return false;
            }
        } else {
            echo "Oh Snap! There are no items in your cart." .$this->conn->error;
            return false;
        }
    }

    public function selectSum($cart_id)
    {
        $sql = "SELECT sum(ci_price) as total_price FROM cart_items WHERE cart_id = $cart_id";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_assoc();
        } elseif ($this->conn->error) {
            echo "ERROR" . $this->conn->error;
        }
    }

    public function selectAllPaymentMethod()
    {
        $sql = "SELECT * FROM payment_method
                    ORDER BY payment_id ASC";
        $result = $this->conn->query($sql);
        $rows = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    public function checkout($cart_id, $ua_id, $payment_id)
    {
        $sql = "UPDATE cart SET cart_status = 'closed'
                    WHERE cart_id = $cart_id";
        $result = $this->conn->query($sql);

        if ($result) {
            $sql = "INSERT INTO checkout(cart_id,ua_id,payment_id)
                VALUES ('$cart_id', '$ua_id', '$payment_id')";

            $result = $this->conn->query($sql);
            if ($result) {
                $this->redirect('index.php');
            } else {
                echo "ERROR" . $this->conn->error;
            }
        }
    }

    public function selectAddress($userid)
    {
        $sql = "SELECT * FROM user_address
                WHERE user_id = $userid";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_assoc();
        } elseif ($this->conn->error) {
            echo "ERROR" . $this->conn->error;
        }
    }

    // public function selectOrderHistory($cart_id, $cart_status)
    // {

    // }

    public function remove_from_cart($ci_id)
    {
        //Step 1. Get the cart item from cart item table with the item details from items table
        $sql = "SELECT * FROM cart_items
              INNER JOIN items ON cart_items.item_id = items.item_id
              WHERE cart_items.ci_id = $ci_id";
        $result = $this->conn->query($sql);

        $cart_item = $result->fetch_assoc();

        //get the new quantity for the item coming from the returned item from cart
        $new_quantity = $cart_item['item_quantity'] + $cart_item['ci_quantity'];
        $item_id = $cart_item['item_id'];
        if ($result) {
            //Step 2. Update item table with the new quantity
            $sql = "UPDATE items SET item_quantity = $new_quantity WHERE item_id = $item_id";

            $result = $this->conn->query($sql);

            if ($result) {
                $sql = "DELETE FROM cart_items WHERE ci_id = $ci_id";
                $result = $this->conn->query($sql);
                if ($result) {
                    $this->redirect("cart.php");
                }
                elseif ($this->conn->error) {
                    echo "ERROR" . $this->conn->error;
                }
            }

            elseif ($this->conn->error) {
                echo "ERROR" . $this->conn->error;
            }
        }

        elseif ($this->conn->error) {
            echo "ERROR" . $this->conn->error;
        }

    }

}

// デリートファンクションつくる
