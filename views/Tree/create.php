<?php
    require BASE_DIR . VIEW_PATH . '/header.php';
?>

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left">
                    <h3>Create section</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="x_panel">
            
            <form method="post" action="<?php echo PROJECT_PATH; ?>tree/create" id="section_form">
            <input type="hidden" name="id" value="<?php echo $this->App->request->get('id'); ?>">
                <div class="error" id="error"></div>
                <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="Name" name="Name" value="<?php echo $this->App->request->get('Name'); ?>" placeholder="" required>
                </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="name">Description</label>
                        <textarea rows="7" class="form-control" id="Description" name="Description"><?php echo $this->App->request->get('Description'); ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <button type="submit" id="form-submit" class="btn btn-primary">Save</button>
                    <a href="<?php echo PROJECT_PATH; ?>tree" class="btn btn-default">Close</a>
                    </div> 
                </div>
            </form>
                
            </div>
        </div>
        <!-- /page content -->

<?php
    require BASE_DIR . VIEW_PATH . '/footer.php';
?>

<script src="<?php echo PROJECT_PATH; ?>js/jquery.min.js"></script>
<script src="<?php echo PROJECT_PATH; ?>js/bootstrap.min.js"></script>
<script src="<?php echo PROJECT_PATH; ?>js/custom.min.js"></script>
<script src="<?php echo PROJECT_PATH; ?>js/validator.js"></script>
<script src="<?php echo PROJECT_PATH; ?>js/tinymce/tinymce.min.js"></script>

<script language="javascript">
$(function(){
    
    tinymce.init({
      selector: '#Description',
      height: 200,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount, fullscreen'
      ],
      toolbar: 'undo redo | formatselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | fullscreen | code',
      end_container_on_empty_block: true
    });
  
    $("#section_form").validator();
});
</script>
    
<?php
    require BASE_DIR . VIEW_PATH . '/end_page.php';
?>