 <?php if ( ! $count) :?>
            <i class="icon-shopping-cart"></i>&nbsp;Ostoskorisi on tyhjä!
          <?php elseif ($count == 1) :?>
            <i class="icon-shopping-cart"></i>&nbsp;<a href="#" onClick="showCart(); return false;">Sisältö <?php echo $count; ?> tuote</a>
           <?php elseif ($count > 1) :?>
            <i class="icon-shopping-cart"></i>&nbsp;<a href="#" onClick="showCart(); return false;">Sisältö <?php echo $count; ?> tuotetta</a>
          <?php endif ?>   