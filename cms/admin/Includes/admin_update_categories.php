<form action = "", method="post">
    <div class = "form-group">
        <label for ="cat_title">Edit Category Title</label>  

        <?php //create edit space and set label
        create_editspace_and_setlabel();
        ?> 

        <?php //Update category title
        update_category_title();
        ?>
        
    </div>
    <div class = "form-group">
        <input class = "btn btn-primary" type ="submit" name ="update_category_submit" value = "Update Category">
    </div>
</form>