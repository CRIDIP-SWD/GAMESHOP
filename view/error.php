<?php
$data = $_GET['data'];
?>
<section id="content">
    <div class="content-wrap">
        <div class="content clearfix">
            <div class="text-center">
                <i class="icon-warning-sign text-warning icon-4x"></i><br>
                <h1>ATTENTION</h1>
                <h3>ACCES INTERDIT</h3>
                <p><?= html_entity_decode($data); ?></p>
            </div>
        </div>
    </div>
</section>
