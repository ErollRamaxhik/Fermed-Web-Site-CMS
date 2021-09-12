<!DOCTYPE html>
<html lang="en">

<?php include "includes/db.php";?>
<?php include "includes/head.php";?>

<body>
<?php $page="products.php";?>
<?php include "includes/navigation.php";?>

<?php
$products=[];
$images=[];
    $stmt = mysqli_prepare($connection,"SELECT product_id,product_title,product_price FROM products");
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$product_id,$product_title,$product_price);
         foreach ($stmt->get_result() as $row) {
            $products[] = $row;
        }
        echo $product_title;
    $stmt = $connection->prepare("SELECT image_id,image_product_title,image_name FROM images");
    $stmt->execute();
    foreach ($stmt->get_result() as $image) {
    $images[] = $image;
    }
        
    ?>

    <header class="mb-5" id="page-header">
        <div class="container mb-2">
            <div class="row">
                <div class="col-md-6 m-auto text-center">
                    <h1>Products Information</h1>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
    <?php foreach($products as $product):?>
    <?php $reference_title = $product['product_title'];?>
        <div class="card shadow-sm mb-3 overflow-hidden">
        <div class="text-center card-header bg-light">
        <h5><i class="fas fa-user"></i> <?php echo $product['product_title'];?></h5>
        </div>
            <div class="row">  
            
                <div class="col-md-6">
                <?php foreach($images as $image):?>
                            <?php if($image['image_product_title']===$reference_title):?>
                            <?php $main_img = $image['image_name'];?>
                            <?php break;?>
                        <?php endif;?>  
                        <?php endforeach; ?>
                    <img class='main-img' id="featured" src="products/<?php echo $main_img ?>" alt="1">
                    <div class=" mt-1" id="slide-wraper">
                        <i id="arrowLeft" class="btn text-primary fas fa-arrow-circle-left fa-2x"></i>
                        <div class="slider" id="slider">
                        
                         <?php foreach($images as $image):?>
                            <?php if($image['image_product_title']===$reference_title):?>
                                <img class='m-1 thumbnail' src='products/<?php echo $image['image_name'];?>' alt='1'>
                            
                        <?php endif;?>  
                        <?php endforeach; ?>
                        <!--<img class='m-1 thumbnail active-img' src='products/' alt='1'>-->
                        
                       
                        </div>
                        <i id="arrowRight" class="btn text-primary fas fa-arrow-circle-right fa-2x"></i>
                    </div>
                </div>
                
                <div class="col-md-6">
                <div class="mt-3"> 
                <h5><i class="fas fa-user"></i> <?php echo $product['product_id']?></h5>
                <h5><i class="fas fa-user"></i> <?php echo $product['product_title']?></h5>
                <h5><i class="fas fa-user"></i> <?php echo $product['product_price']?></h5>
                </div>   
                </div>
            </div>
            <div class="bg-warning card-footer text-center">
            <h5><i class=" fas fa-user"></i> <?php echo $product['product_price']?></h5>
            </div>
            
        </div>
        <?php endforeach;?>
    </div>


  <?php include"includes/footer.php"; ?>
  <script>
   //const card = document.getElementsByClassName('card');
   const thumbnails = document.querySelectorAll('.thumbnail');
   const cards = document.querySelectorAll('.main-img');
   const slider = document.querySelectorAll('.slider');
   const slideWraper = document.querySelectorAll('#slide-wraper');
   //let btnRight = document.getElementById('arrowRight');
   // let btnLeft = document.getElementById('arrowLeft');

   slider.forEach(function(slide){
    const images=slide.querySelectorAll('img')
    images.forEach(function(image){
        image.addEventListener('mouseover',function(){
            image.closest('.col-md-6').querySelector('.main-img').src=this.src;
            
            this.parentElement.querySelectorAll('img').forEach(function(e){
                if(this!==e){
                    e.style.opacity=0.5;
                }
            });
            this.style.opacity=1;
            //console.log(this.parentElement)
            
        })
    })
   });

    const btnLeft= document.querySelectorAll('#arrowLeft');
    const btnRight = document.querySelectorAll('#arrowRight');

    btnRight.forEach(function(btn){
        btn.addEventListener('click',function(e){
            this.parentElement.querySelector('.slider').scrollLeft += 180;
        })
    })
     btnLeft.forEach(function(btn){
        btn.addEventListener('click',function(e){
            this.parentElement.querySelector('.slider').scrollLeft -= 180;
        })
    }) 

  </script>
</body>
</html>