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
                <li><a href="#tabs-1"><?= $grpNames[0]['Group Name']; ?></a></li>
                <li><a href="#tabs-2"><?= $grpNames[1]['Group Name']; ?></a></li>
                <li><a href="#tabs-3"><?= $grpNames[2]['Group Name']; ?></a></li>
                <li><a href="#tabs-4"><?= $grpNames[3]['Group Name']; ?></a></li>
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
                        echo "<a href='/product/category/1/".$item['Category ID']."'>$content</a>";
                        echo "</td>";
                    } else if ($counter % 3 == 2) {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/1/".$item['Category ID']."'>$content</a>";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/1/".$item['Category ID']."'>$content</a>";
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
                        echo "<a href='/product/category/2/".$item['Category ID']."'>$content</a>";
                        echo "</td>";
                    } else if ($counter % 3 == 2) {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/2/".$item['Category ID']."'>$content</a>";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/2/".$item['Category ID']."'>$content</a>";
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
                        echo "<a href='/product/category/3/".$item['Category ID']."'>$content</a>";
                        echo "</td>";
                    } else if ($counter % 3 == 2) {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/3/".$item['Category ID']."'>$content</a>";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/3/".$item['Category ID']."'>$content</a>";
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
                        echo "<a href='/product/category/4/".$item['Category ID']."'>$content</a>";
                        echo "</td>";
                    } else if ($counter % 3 == 2) {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/4/".$item['Category ID']."'>$content</a>";
                        echo "</td>";
                        echo "</tr>";
                    } else {
                        echo "<td>";
                        $content = $item['cname'];
                        $counter++;
                        echo "<a href='/product/category/4/".$item['Category ID']."'>$content</a>";
                        echo "</td>";
                    }
                }
                echo "</table>";
                ?>
            </div>
        </div>

    </div>
    <div id="featured_slide">

        <div class="featured_box"><a href="#"><img src="/assets/images/demo/(1).jpg" alt="" /></a>

        </div>
        <div class="featured_box"><a href="#"><img src="/assets/images/demo/(2).jpg" alt="" /></a>

        </div>
        <div class="featured_box"><a href="#"><img src="/assets/images/demo/(3).jpg" alt="" /></a>

        </div>
        <div class="featured_box"><a href="#"><img src="/assets/images/demo/(4).jpg" alt="" /></a>

        </div>
        <div class="featured_box"><a href="#"><img src="/assets/images/demo/(5).jpg" alt="" /></a>

        </div>

    </div>
</div>