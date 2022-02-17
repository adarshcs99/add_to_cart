<?php
	$products = array(array("id"=>101,"name"=>"football","src"=>"images/football.png","price"=>150.00,"quantity"=>0),array("id"=>102,"name"=>"tennis","src"=>"images/tennis.png","price"=>120.00,"quantity"=>0),array("id"=>103,"name"=>"basketball","src"=>"images/basketball.png","price"=>90.00,"quantity"=>0),array("id"=>104,"name"=>"table-tennis","src"=>"images/table-tennis.png","price"=>110.00,"quantity"=>0),array("id"=>105,"name"=>"soccer","src"=>"images/soccer.png","price"=>80.00,"quantity"=>0));
	function table_head(&$head)
    {
        $head = "<table>
                        <tr>
                            <td>Product</td>
                            <td>Product Name</td>
                            <td>Product Price</td>
                            <td>Product Quantity</td>
                            <td>Total</td>
                        </tr>
                    </table>";
     return $head;
    }

    function table_content($array_get)
    {
        $content = "<table>";
        foreach($array_get as $k1=>$v1)
        {
            $content .= "<tr><td>".$v1['id']."</td>";
            $content .= "<td>".$v1['name']."</td>";
            $content .= "<td>".$v1['price']."</td>";
            $content .= "<td>"."<input type=text value=".$v1['quantity']."></td>";
            $content .= "<td>".$v1['price'] * $v1['quantity']."</td></tr>";


        }
        $content .= "</table>";
        $content .= "<input type=button value = update>";
        $content .= "<input type=hidden value = update>";
        return $content;
    }

	function display()
	{	
		foreach($GLOBALS['products'] as $k1=>$v1)
			{
				echo "<div id=product-",$v1['id']," class=product>";
				echo "<img src=".$v1['src'].">";
				echo "<h3 class="."title"." <a href=#>"."Product ".$v1['id']."</a></h3>";
				echo "<span>Price: ".$v1["price"]."</span>";
				echo "<a class="."add-to-cart ". "href="."products.php?id=".$v1['id'].">Add To Cart</a>";
				echo "</div>";
			}
	}

    if(isset($_GET))
    {
        session_start();
        $id = $_GET['id'];
        if(!isset($_SESSION['cart']))
        {
            $_SESSION['cart'] = $products;
            foreach($_SESSION['cart'] as $k1=>$v1)
            {
                if($v1['id'] == intval($id))
                {
                    $_SESSION['cart'][$k1]['quantity']+=1;
                }
            }
            echo "hello";
            
        }
        else
        {
            foreach($_SESSION['cart'] as $k1=>$v1)
            {
                if($v1['id'] == intval($id))
                {
                    $_SESSION['cart'][$k1]['quantity']+=1;
                }
            }
            echo "hellooooo";
            
        }
        $head = "";
       echo table_head($head);
       echo table_content($_SESSION['cart']);
       
    }
?>