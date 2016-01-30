<?php
ini_set("display_errors", 1);
if(!isset($_SESSION['logged']))
{
    $error = "Cette Accès vous est Interdit";
    header("Location: index.php?view=error&data=$error");
}
?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title><?= \App\constante::NOM_SITE; ?></title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap/css/bootstrap.css" />

    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-datepicker/css/datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/stylesheets/'), true, false); ?>theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/stylesheets/'), true, false); ?>skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/stylesheets/'), true, false); ?>theme-custom.css">

    <!-- Head Libs -->
    <script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>modernizr/modernizr.js"></script>



    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>morris/morris.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>chartist/chartist.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>select2/select2.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-datatables-bs3/assets/css/datatables.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>pnotify/pnotify.custom.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-tagsinput/bootstrap-tagsinput.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-timepicker/css/bootstrap-timepicker.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>dropzone/css/basic.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>dropzone/css/dropzone.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-markdown/css/bootstrap-markdown.min.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>summernote/summernote.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>summernote/summernote-bs3.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>codemirror/lib/codemirror.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>codemirror/theme/monokai.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-fileupload/bootstrap-fileupload.min.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>isotope/jquery.isotope.css" />
</head>
<body >
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="index.php?view=admin_sha" class="logo">
                <img src="assets/images/logo.png" height="35" alt="Porto Admin" />
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="<?= $constante->getUrl(array('porto/images/'), true, false); ?>!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name">John Doe Junior</span>
                        <span class="role">administrator</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="core/login.php?action=logout"><i class="fa fa-power-off"></i> Déconnexion</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="index.php?view=index"><i class="fa fa-arrow-left"></i> Retour au Site Web</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    <?= \App\constante::NOM_SITE; ?>
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                        <ul class="nav nav-main">
                            <li>
                                <a href="index.php?view=admin_sha">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Accueil</span>
                                </a>
                            </li>
                            <li>
                                <a href="index.php?view=admin_sha&sub=client">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Client</span>
                                </a>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <span>Produits</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="index.php?view=admin_sha&sub=categories">
                                            Catégories
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?view=admin_sha&sub=produits">
                                            Produits
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="index.php?view=admin_sha&sub=commande">
                                    <i class="fa fa-file" aria-hidden="true"></i>
                                    <span>Commandes</span>
                                </a>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    <span>Configuration</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="index.php?view=admin_sha&sub=config_slide">
                                            Slideshow
                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?view=admin_sha&sub=config_cron">
                                            CRON
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>

        </aside>
        <!-- end: sidebar -->

        <?= $content; ?>
    </div>

    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark" ></div>

                        <ul>
                            <li>
                                <time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
                                <span>Company Meeting</span>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-widget widget-friends">
                        <h6>Friends</h6>
                        <ul>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </aside>
</section>

<!-- Vendor -->
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery/jquery.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap/js/bootstrap.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>nanoscroller/nanoscroller.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>magnific-popup/magnific-popup.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-placeholder/jquery.placeholder.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>theme.js"></script>

<!-- Theme Custom -->
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>theme.custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>theme.init.js"></script>

<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>morris/morris.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>pnotify/pnotify.custom.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>select2/select2.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-datatables/media/js/jquery.dataTables.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-datatables-bs3/assets/js/datatables.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-maskedinput/jquery.maskedinput.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>fuelux/js/spinner.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>dropzone/dropzone.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-markdown/js/markdown.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-markdown/js/to-markdown.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-markdown/js/bootstrap-markdown.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>codemirror/lib/codemirror.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>codemirror/addon/selection/active-line.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>codemirror/addon/edit/matchbrackets.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>codemirror/mode/javascript/javascript.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>codemirror/mode/xml/xml.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>codemirror/mode/css/css.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>summernote/summernote.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-maxlength/bootstrap-maxlength.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>ios7-switch/ios7-switch.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-confirmation/bootstrap-confirmation.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-validation/jquery.validate.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>jquery-autosize/jquery.autosize.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>isotope/jquery.isotope.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<script src="<?= $constante->getUrl(array('porto/vendor/'), true, false); ?>ckeditor/ckeditor.js"></script>

<!-- UNDER SCRIPT -->
<script type="text/javascript">
    CKEDITOR.replace('long_description');
</script>
<script type="text/javascript">
    function calcul(){
        var prix_vente = parseFloat(document.getElementById('prix_vente'));
        var revenue_point = document.getElementById('revenue_point');
        var cout_point = document.getElementById('cout_point');

        var nbPoint = revenue_point / 10;
        var bLimit = 150;
        var coef = 1.8;

        revenue_point.value = bLimit * nbPoint;
        cout_point.value = (prix_vente * coef)*100;

    }
</script>

<!-- FINNALY SCRIPT-->

<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>ui-elements/examples.lightbox.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>tables/examples.datatables.default.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>tables/examples.datatables.row.with.details.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>tables/examples.datatables.tabletools.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>ui-elements/examples.modals.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>forms/examples.advanced.form.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>forms/examples.validation.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>pages/examples.mediagallery.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>forms/examples.wizard.js"></script>
<script src="<?= $constante->getUrl(array('porto/javascripts/'), true, false); ?>ajax.js"></script>

<?php if(isset($_GET['success']) && $_GET['success'] == 'supp-adresse'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'SUCCES',
                text: "<?= $_GET['text']; ?>",
                type: 'success'
		    }); 
        })
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-adresse'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'SUCCES',
                text: "<?= $_GET['text']; ?>",
                type: 'success',
                icon: 'fa fa-check'
		    }); 
        })
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-commande'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'SUCCES',
                text: "<?= $_GET['text']; ?>",
                type: 'success',
                icon: 'fa fa-check'
		    });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-categorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'ATTENTION',
                text: "<?= $_GET['text']; ?>",
                type: "success"
            });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'supp-categorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'SUCCES',
                text: "<?= $_GET['text']; ?>",
                type: "success"
            });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-subcategorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'SUCCES',
                text: "<?= $_GET['text']; ?>",
                type: "success"
            });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'supp-subcategorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'SUCCES',
                text: "<?= $_GET['text']; ?>",
                type: "success"
            });
        })
    </script>
<?php } ?>

<?php if(isset($_GET['warning']) && $_GET['warning'] == 'add-categorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'ATTENTION',
                text: "<?= $_GET['text']; ?>"
            });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['warning']) && $_GET['warning'] == 'supp-categorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'ATTENTION',
                text: "<?= $_GET['text']; ?>"
            });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['warning']) && $_GET['warning'] == 'supp-subcategorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'ATTENTION',
                text: "<?= $_GET['text']; ?>"
            });
        })
    </script>
<?php } ?>

<?php if(isset($_GET['error']) && $_GET['error'] == 'supp-adresse'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'Erreur',
                text: "<?= $_GET['text']; ?>",
                type: 'error'
		    }); 
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-adresse'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'Erreur',
                text: "<?= $_GET['text']; ?>",
                type: 'error',
                icon: 'fa fa-times'
		    }); 
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-commande'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'Erreur',
                text: <?= $_GET['text']; ?>,
                type: 'error',
                icon: 'fa fa-times'
		    });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-categorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'ERREUR',
                text: "<?= $_GET['text']; ?>",
                type: "error"
            });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'supp-categorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'ERREUR',
                text: "<?= $_GET['text']; ?>",
                type: "error"
            });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-subcategorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'ERREUR',
                text: "<?= $_GET['text']; ?>",
                type: "error"
            });
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'supp-subcategorie'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'ERREUR',
                text: "<?= $_GET['text']; ?>",
                type: "error"
            });
        })
    </script>
<?php } ?>

</body>
</html>