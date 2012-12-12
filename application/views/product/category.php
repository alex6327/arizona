

  <div id="container">
    <h1>
        <?=$catName ?>
    </h1>
      <?php if($alphaList == TRUE): ?>
      <p class ="category" style ="margin-left: 10px; font-size: 12px;">
      <?php     foreach ($alphabeta as $letter): ?>
          
          <?php if($alpha == $letter): ?>
            <span style="font-size:20px; color:#F00; font-weight:bold;"><?=$letter ?></span>
          <?php else: ?>
            <a href="/product/category/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?=$letter ?>/1"><?=$letter ?></a>
      <?php endif; ?>
      <?php    endforeach; ?>
            </p>
            <?php endif; ?>
            <?php foreach($records as $item): ?>
      <ul style="font-family:Arial, Helvetica, sans-serif;font-size:12px;line-height:20px;width:250px;">
          <li><a  href="">
      <?=$item['sname']; ?>
    </a></li>
      </ul>  
      <?php endforeach; ?>
            
      <?php echo $pagination; ?>
  </div>
