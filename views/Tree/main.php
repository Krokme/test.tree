<?php
    require BASE_DIR . VIEW_PATH . '/header.php';
?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left">
                    <h3>Sections</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="x_panel">
                <a href="<?=PROJECT_PATH?>tree/create" class="btn btn-primary">Add new</a>
                <?php if (!empty($data['success'])) { ?> 
                <div id="success" class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?=$data['success']?></div>
                <?php } if (!empty($data['error'])) { ?> 
                <div id="error" class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?=$data['error']?></div>
                <?php } ?>
                <table id="w1" class="table table-striped table-bordered">
                <?=$data['tree']?>
                </table>
            </div>
        </div>
        <!-- /page content -->

<?php
    require BASE_DIR . VIEW_PATH . '/footer.php';
?>

<script src="<?php echo PROJECT_PATH; ?>js/jquery.min.js"></script>
<script src="<?php echo PROJECT_PATH; ?>js/bootstrap.min.js"></script>
<script src="<?php echo PROJECT_PATH; ?>js/custom.min.js"></script>
<script src="<?php echo PROJECT_PATH; ?>js/jquery.treegrid.min.js"></script>

<script type="text/javascript">
$(function() {
    jQuery('#w1').treegrid({
        'initialState': 'expanded',
        expanderExpandedClass: 'glyphicon glyphicon-folder-open',
        expanderCollapsedClass: 'glyphicon glyphicon-folder-close'
    });
});
</script>
    
<?php
    require BASE_DIR . VIEW_PATH . '/end_page.php';
?>