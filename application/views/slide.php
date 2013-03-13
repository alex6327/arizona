<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div id="slide">
  <div id="category_menu">
    <div id="tabs">
      <ul>
        <li><a href="#tabs-1">
          <?= $grpNames[0]['Group Name']; ?>
          </a></li>
        <li><a href="#tabs-2">
          <?= $grpNames[1]['Group Name']; ?>
          </a></li>
        <li><a href="#tabs-3">
          <?= $grpNames[2]['Group Name']; ?>
          </a></li>
        <li><a href="#tabs-4">
          <?= $grpNames[3]['Group Name']; ?>
          </a></li>
      </ul>
      <div id="tabs-1">
        <?php
                echo "<table>";
                $counter = 0;
                foreach ($reagents as $item) {
                    if ($counter % 3 == 0) {
                        echo "<tr>";
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
						if($item['Category ID'] == 47)
						{
							echo "$content";
							echo "</td>";
						}else{
                        echo "<a href='/product/category/1/" . $item['Category ID'] . "'>$content</a>";
                        echo "</td>";
						}
                    } else if ($counter % 3 == 2) {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/1/" . $item['Category ID'] . "'>$content</a>";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/1/" . $item['Category ID'] . "'>$content</a>";
                        echo "</td>";
                    }
                }
                echo "</table>";
                ?>
      </div>
      <div id="tabs-2">
        <?php
                echo "<table>";
                $counter = 0;
                foreach ($services as $item) {
                    if ($counter % 3 == 0) {
                        echo "<tr>";
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a>$content</a>";
                        echo "</td>";
                    } else if ($counter % 3 == 2) {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a>$content</a>";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a>$content</a>";
                        echo "</td>";
                    }
                }
                echo "</table>";
                ?>
      </div>
      <div id="tabs-3">
        <?php
                echo "<table>";
                $counter = 0;
                foreach ($equipments as $item) {
                    if ($counter % 3 == 0) {
                        echo "<tr>";
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a>$content</a>";
                        echo "</td>";
                    } else if ($counter % 3 == 2) {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a>$content</a>";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a>$content</a>";
                        echo "</td>";
                    }
                }
                echo "</table>";
                ?>
      </div>
      <div id="tabs-4">
        <?php
                echo "<table>";
                $counter = 0;
                foreach ($softwares as $item) {
                    if ($counter % 3 == 0) {
                        echo "<tr>";
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a>$content</a>";
                        echo "</td>";
                    } else if ($counter % 3 == 2) {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a>$content</a>";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a>$content</a>";
                        echo "</td>";
                    }
                }
                echo "</table>";
                ?>
      </div>
    </div>
  </div>
  <div id="featured_slide">
    <div class="featured_box"><a href="#"><img src="/assets/images/flash-1.png" alt="" /></a> </div>
    <div class="featured_box"><a href="#"><img src="/assets/images/flash-2.png" alt="" /></a> </div>
    <div class="featured_box"><a href="#"><img src="/assets/images/flash-3.png" alt="" /></a> </div>
    <div class="featured_box"><a href="#"><img src="/assets/images/flash-4.png" alt="" /></a> </div>
    <div class="featured_box"><a href="#"><img src="/assets/images/flash-5.png" alt="" /></a> </div>
  </div>
</div>
