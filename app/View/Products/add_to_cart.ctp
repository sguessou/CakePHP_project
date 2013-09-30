
<?php if ($dataitems) :?>


  
  <h3><i class="icon-shopping-cart icon-large"></i>&nbsp;&nbsp;Ostoskori</h3>
  <table class="table table-hover">
         <thead>
         <tr>
            <th>#</th>
            <th>Tuotenimi</th>
            <th>hinta</th>
         </tr>
         </thead>
         <tbody>
    
        <?php $num = 1; ?>
          
         <?php foreach ($dataitems as $dataitem) :?>
          
            <tr>
            <td><?php echo $num++; ?></td>

            <?php if ( $dataitem['product_types']['typeName'] == 'Book') :?>
                <td><i class="icon-book"></i>&nbsp;&nbsp;<a href="#"><?php echo $dataitem['products']['product_name']; ?></a>
                </td>
            <?php elseif ( $dataitem['product_types']['typeName'] == 'Dvd') :?>  
                <td><i class="icon-film"></i>&nbsp;&nbsp;<a href="#"><?php echo $dataitem['products']['product_name']; ?></a>
                </td>
            <?php endif ?>
                
             <td><?php echo $dataitem['products']['product_price']; ?></td>
            </tr>

         <?php endforeach; ?> 

         </tbody>
         </table>  

   		<p><a href="/products/emptyCart" class="btn btn-danger" ><i class="icon-trash"></i>&nbsp;Tyhjennä!</a></p>

            


<?php elseif ( ! $dataitems) :?>

	<div class="alert alert-danger">
           <strong>Huomio!</strong> Ostoskori on tyhjä!
  </div>

<?php endif; ?> 	

