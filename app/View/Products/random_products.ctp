
         
        
           		<?php $i = 0; ?>
           		<?php foreach ($products as $product) :?>				
           			
           				<img class="img-rounded" src="/images/<?php echo $product['products']['product_id']; ?>.jpg" height="160" width="120">&nbsp;
           			<?php $i++; if ( $i == 4) echo '<p>&nbsp;</p>'; ?>	
           		<?php endforeach ?>
              
 





