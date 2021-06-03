<?php 
session_start();


if($_SESSION['mobno'] === NULL){
  session_destroy();
  echo"<script>
      alert('Login is Required');
      window.location.href='face.php';
      </script>";
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
  if(isset($_POST['add_to_cart']))
  {
    if($_SESSION['mobno'] === NULL){
      session_destroy();
      echo"<script>
          alert('Login is Required');
          window.location.href='face.php';
          </script>";
    }

    if(isset($_SESSION['cart']))
    {
        $myitems=array_column($_SESSION['cart'],'pid');
        if(in_array($_POST['pid'],$myitems))
        {
            echo"<script>
            alert('Item Already Added');
            window.location.href='main.php';
            </script>";
        }
        else{
       $count=count($_SESSION['cart']);
       $_SESSION['cart'][$count]=array('pid'=>$_POST['pid']);
       $_SESSION['cart'][$count]['Quantity']=1;
       echo"<script>
       alert('Item Added');
       window.location.href='main.php';
       </script>";
        }
    }
    else
    {
      $_SESSION['cart'][0]=array('pid'=>$_POST['pid']);
      $_SESSION['cart'][0]['Quantity']=1;
      echo"<script>
            alert('Item Added');
            window.location.href='main.php';
            </script>";
    }
  }

  if(isset($_POST['remove'])){
      foreach($_SESSION['cart'] as $key => $value)
      {
        if($value['pid']==$_POST['pid']){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo"<script>
            alert('Item Removed');
            window.location.href='cart.php';
            </script>";
        }
      }
  }

  if(isset($_POST['mod_quantity']))
  {
    foreach($_SESSION['cart'] as $key => $value)
    {
      if($value['pid']==$_POST['pid'])
      {
        $_SESSION['cart'][$key]['Quantity']=$_POST['mod_quantity'];  
        echo"<script>
          window.location.href='cart.php';
          </script>";
      }
    }

  }
}