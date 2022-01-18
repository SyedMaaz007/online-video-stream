<ul class="sidebar navbar-nav toggled">
   <li class="nav-item">
               <a class="nav-link" href="index.php">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
   </li>
   <?php $dis = $upload->distinct('subject',['sem'=>$_SESSION['sem']]);
                        foreach($dis as $doc)
                        {
                           ?>
   <li class="nav-item">
              <a class="nav-link" href="channels.php?subject=<?php echo $doc ?>">
               <i class="fas fa-fw fa-folder"></i>
               <span><?php echo $doc ?> </span>
               </a>
   </li>
   <?php } ?>
   <li class="nav-item">
               <a class="nav-link" href="watchlist.php">
               <i class="fas fa-fw fa-star"></i>
               <span>Watchlist</span>
               </a>
   </li>
   <li class="nav-item">
               <a class="nav-link" href="history.php">
               <i class="fas fa-fw fa-star"></i>
               <span>Watch History</span>
               </a>
   </li>
</ul>
