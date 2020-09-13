<?php
        include("includes/config.php");
        
        //We are referring to value of submit
    
    if (!isset($_POST['searchbar']))
        {
            
            
           header("Location : searchpage.html");
        }

        $query="SELECT * FROM model INNER JOIN car_images ON model.Model_ID=car_images.Model_ID WHERE Name LIKE '%".$_POST['searchbar']."%'";
        $search_query=mysqli_query($con,$query);
        
        if(mysqli_num_rows($search_query) !=0 )
        {
            $result=mysqli_fetch_assoc($search_query); 
        }

 
?>


<html>
    <head>
        <title>Search results</title>
<!--        <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">-->
        <link href="https://fonts.googleapis.com/css2?family=Kufam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="demostyle2.css">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Kufam&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&family=Hind+Siliguri:wght@500&family=Kufam&display=swap" rel="stylesheet">
        <script src="script.js"></script>
    </head>
    
    <body>
        
        <header>
              <img src="logo-1561819118194.png" class="mainIcon">
        </header>
        
        <div class="models">
            
            
        
            
            <?php 
                if(mysqli_num_rows($search_query)!=0 )
                {
                    ?>

                
                <p class="result"> MODELS FOUND </p>
                <div class="container">
                    
                <?php
                    
                    do 
                    {  $image=$result['Image_path']; ?> 
                        
            
            <div class="box"><br><br><img src="<?php echo $image;?>" height="100px" width="200px">
                <div class="text">
                    <h3>
                        <div class="name"><?php echo $result['Name']; ?></div>
                        <h3>ENGINE </h3><?php echo $result['Engine']; ?>
                    <br>
                        <h3>CYLINDER </h3><?php echo $result['Cylinders']; ?>
                    <br>
                        <h3>ECONOMY </h3><?php echo "Economy :".$result['Economy']; ?>
                    <br>
                        <h3>PRICE </h3><?php echo "Price :".$result['Price']; ?>
                    <br>
                        <h3>SEATS </h3><?php echo "Seats :".$result['Seats']; ?>
                    <br>
                        <h3>VARIANTS </h3><?php echo "Variants :".$result['Variants']; ?>
                    <br>
                    
                        
                    </h3>
                    </div> 
            </div>
                
                
            
                    <?php }while($result=mysqli_fetch_assoc($search_query));
                      
                }
                else
                {
                    ?>
                </div>
            </div>
                <div class="models">
                    <p> No results found </p>
                    <div class="container">
        
                    </div>
                </div>
            
                <?php
                }
            ?>
                
    </body>
</html>