 <?php if ( ! $count) :?>
            <i class="icon-shopping-cart"></i>&nbsp;Ostoskorisi on tyhjä!
          <?php elseif ($count == 1) :?>
            <i class="icon-shopping-cart"></i>&nbsp;<?php echo $this->Js->link('Sisältö '.$count.' tuote',
                                                                               array('controller' => 'products',
                                                                                     'action' => 'index'),
                                                                               array('update' => '#viewCart')
                                                                          ); ?>
           <?php elseif ($count > 1) :?>
            <i class="icon-shopping-cart"></i>&nbsp;<?php echo $this->Js->link('Sisältö '.$count.' tuotetta',
                                                                               array('controller' => 'products',
                                                                                     'action' => 'index'),
                                                                               array('update' => '#viewCart')
                                                                          ); ?>
          <?php endif ?>   