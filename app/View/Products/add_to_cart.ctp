 
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
          <td><?php echo $dataitem['products']['product_name']; ?></td>
           <td><?php echo $dataitem['products']['product_price']; ?></td>
          </tr>

       <?php endforeach; ?> 

       </tbody>
       </table>  

 		<p><a href="/products/emptyCart" class="btn btn-danger" ><i class="icon-trash"></i>&nbsp;Tyhjennä!</a></p>     

<?php elseif ( ! $dataitems) :?>

	<p>No data</p>

<?php endif; ?> 	

