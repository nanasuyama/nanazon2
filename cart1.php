<?php

    include 'header.php';

?>
<br><br><br><br><br>
   
<section>
        <div class="cartItem">

            <table class="table">
                <thead>
                    <tr id="tr">
                        <th> Item </th>
                        <th> Name </th>
                        <th> Price </th>
                        <th> Quantity </th>
                        <th> action </th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="index">
                        <td> <img src="images/item1.jpg" id="img1" alt=""> </td>
                        <td> Tshirt Tshirt Tshirt</td>
                        <td> $ 50 </td>
                        <td> 1 </td>
                        <td> <a  id="delete" href="">Delete</a> </td>
                    
                    </tr>

                    <tr>
                        <td> <img src="images/item2.jpg" id="img2" alt=""> </td>
                        <td> Tshirt Tshirt</td>
                        <td> $ 50 </td>
                        <td> 1 </td>
                        <td> <a  id="delete" href="">Delete</a> </td>
                    
                    </tr>

                    <tr>
                        <td> <img src="images/item3.jpg" id="img3" alt=""> </td>
                        <td> Tshirt </td>
                        <td> $ 50 </td>
                        <td> 1 </td>
                        <td> <a  id="delete" href="">Delete</a> </td>
                    
                    </tr>
                    
                </tbody>
            </table>
            
        </div>


        <div class="payment">
            <div class="details">

                <h2>Address</h2>
                <p id="paymentP"> Jose Maria del Mar St, Cebu City, Cebu</p><br>
    
                <h2>Subtotal</h2>
                <p id="paymentP"> $ 150.00- </p><br>
    
                <h2>Shipping Fee</h2>
                <p id="paymentP"> Free </p><br>
    
                <h2> Total </h2>
                <p id="paymentP"> $ 150.00- </p><br>
    
                <h2>Pay by...</h2><br>
                <form action="" method="">
                    <input type="radio" name="payment" id="credit" checked>
                    <span id="pm">  Credit Card  </span>
                    
                    <input type="radio" name="payment" id="paypal">  
                    <span id="pm">  Paypal  </span>
    
                    <input type="radio" name="payment" id="cash">  
                    <span id="pm">  Cash  </span>
                </form>
    
                <input type="submit" value="Purchase" name="purchase" id="purchase"><br><br>
    
                 <a id="shopMore" href="index.html">Shop More</a>
                

            </div>



        </div>

    </section>
 


<?php 
	include 'footer.php';
?>