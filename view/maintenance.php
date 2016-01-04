<?php
$sql_maintenance = mysql_query("SELECT * FROM site_maintenance WHERE id = '1'")or die(mysql_error());
$maintenance = mysql_fetch_array($sql_maintenance);
?>
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="heading-block center nobottomborder">
                <h1>Le site est actuellement en maintenance</h1>
                <span>Revenez plus tard.</span>
            </div>

            <div class="col_one_third topmargin">
                <div class="feature-box fbox-center fbox-light fbox-plain">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-warning-sign"></i></a>
                    </div>
                    <h3>Pourquoi?</h3>
                    <p><?= html_entity_decode($maintenance['pourquoi']); ?></p>
                </div>
            </div>

            <div class="col_one_third topmargin">
                <div class="feature-box fbox-center fbox-light fbox-plain">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-time"></i></a>
                    </div>
                    <h3>Temps restant:</h3>
                    <div id="countdown-ex4" class="countdown countdown-inline"></div>
                </div>
            </div>

            <div class="col_one_third topmargin col_last">
                <div class="feature-box fbox-center fbox-light fbox-plain">
                    <div class="fbox-icon">
                        <a href="#"><i class="icon-email3"></i></a>
                    </div>
                    <h3>Do you need Support?</h3>
                    <p>You may simply send us an Email at <a href="mailto:info@canvas.com">info@canvas.com</a> if you need urgent support.</p>
                </div>
            </div>

        </div>

    </div>

</section>
<script>
    jQuery(document).ready( function($){

        var newDate4 = new Date(<?= date("Y", $maintenance['temps']); ?>, <?= date("m", $maintenance['temps']); ?>, <?= date("d", $maintenance['temps']); ?>);
        $('#countdown-ex4').countdown({until: newDate4});


    });
</script>