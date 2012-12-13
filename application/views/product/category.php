

<div id="container">
    <h1>
        <?= $catName ?>
    </h1>
    <?php if ($alphaList == TRUE): ?>
        <p class ="category" style ="margin-left: 10px; font-size: 12px;">
            <?php foreach ($alphabeta as $letter): ?>

                <?php if ($alpha == $letter): ?>
                    <span style="font-size:20px; color:#F00; font-weight:bold;"><?= $letter ?></span>
                <?php else: ?>
                    <a href="/product/category/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?= $letter ?>/1"><?= $letter ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
        </p>
    <?php endif; ?>
    <?php
    echo "<table>";
    $counter = 0;
    foreach ($records as $item) {
        if ($counter % 3 == 0) {
            echo "<tr>";
            echo "<td>";
            $content = $item['sname'];
            $counter++;
            echo "<a href='/product/listing/" . $grpId . "/" . $catId . "/" . $item['sn'] . "'>$content</a>";
            echo "</td>";
        } else if ($counter % 3 == 2) {
            echo "<td>";
            $content = $item['sname'];
            $counter++;
            echo "<a href='/product/listing/" . $grpId . "/" . $catId . "/" . $item['sn'] . "'>$content</a>";
            echo "</td>";
            echo "</tr>";
        } else {
            echo "<td>";
            $content = $item['sname'];
            $counter++;
            echo "<a href='/product/listing/" . $grpId . "/" . $catId . "/" . $item['sn'] . "'>$content</a>";
            echo "</td>";
        }
    }
    echo "</table>";
    ?>


    <div id ="pagniation"><?php echo $pagination; ?></div>

</div>
