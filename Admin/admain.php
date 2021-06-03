<?php 
session_start();
?>

<html>
<head>
    <title>Menswear</title>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://ude.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="hero">
        <div class="navbar">
            <img src="../images/logo.png" class="logo rotate">
            <div class="bu">
            <button type="button" class="btn btn-outline-danger"><a href="../Logout.php" >Logout</a></button>
        </div>
        </div>
        <div class="content">
        <div class="row">`
            <div class="col-lg-12 text-center border rounded text-color white ml-5">
                <h2>New Content</h2>
            </div>
    

            <div class="col-lg-5 ml-5 mt-5">
                <div class="border bg-light rounded p-4">
             <table class="table">
                <thead class="text-center">
                    <th scope="col">Tables</th>
                    <th scope="col">  </th>
                    <th scope="col"> Operation </th>
                    <th scope="col"></th>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Brand</td>
                        <td></td>
                        <td>

                            <form action="nbrand.php" method="POST">
                            <button class='btn btn-outline-success' name="remove">Add</button>
                            </form>                       
                        </td>    
                    </tr>

                    <tr>
                        <td>Category</td>
                        <td></td>
                        <td>

                            <form action="ncategory.php" method="POST">
                            <button class='btn btn-outline-success' name="remove">Add</button>
                            <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                            </form>                       
                        </td>    
                    </tr>

                    <tr>
                        <td>Clothe Type</td>
                        <td></td>
                        <td>

                            <form action="nctype.php" method="POST">
                            <button class='btn btn-outline-success' name="remove">Add</button>
                            <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                            </form>                       
                        </td>    
                    </tr>

                    <tr>
                        <td>Pattern</td>
                        <td></td>
                        <td>

                            <form action="npattern.php" method="POST">
                            <button class='btn btn-outline-success' name="remove">Add</button>
                            <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                            </form>                       
                        </td>    
                    </tr>

                    <tr>
                        <td>Fitting</td>
                        <td></td>
                        <td>

                            <form action="nfitting.php" method="POST">
                            <button class='btn btn-outline-success' name="remove">Add</button>
                            <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                            </form>                       
                        </td>    
                    </tr>
                
                </tbody>
            </table>
            </div>
        </div>
    

         

        <div class="col-lg-6 mt-5">
            <div class="border bg-light rounded p-4">
            <table class="table">
                <thead class="text-center">
                    <th scope="col">Table</th>
                    <th scope="col"> Add </th>
                    <th scope="col"> Remove </th>
                    <th scope="col"></th>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Product</td>
                        <td>

                            <form action="nproduct.php" method="POST">
                            <button class='btn btn-outline-success' name="remove">Add</button>
                            <a href="../face.php"></a>
                            <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                            </form>                       
                        </td> 
                        <td>

<form action="dproduct.php" method="POST">
<button class='btn btn-outline-danger' name="remove">Remove</button>
<input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
</form>                       
</td>   
                    </tr>

                    <tr>
                        <td>Customer</td>
                        <td>

                            <form action="ncust.php" method="POST">
                            <button class='btn btn-outline-success' name="remove">Add</button>
                            <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                            </form>                       
                        </td>  
                        <td>

<form action="dcust.php" method="POST">
<button class='btn btn-outline-danger' name="remove">Remove</button>
<input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
</form>                       
</td>  
                    </tr>

                  

                    
                
                </tbody>
            </table>
     <br><br><br>

            <table class="table">
                <thead class="text-center">
                    <th scope="col">Table</th>
                    <th scope="col">  </th>
                    <th scope="col"> Operation </th>
                    <th scope="col"></th>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td>Order</td>
                        <td></td>
                        <td>

                            <form action="dorder.php" method="POST">
                            <button class='btn btn-outline-success' name="remove">Details</button>
                            <input type='hidden' name='pid' value='<?php echo $product['pid']; ?>'>
                            </form>                       
                        </td>    
                    </tr>

                    

        

        
                
                </tbody>
            </table>
 




            </div>
        </div>






        



       


        </div>
        </div>
        </div>
    </div>

</body>
</html>