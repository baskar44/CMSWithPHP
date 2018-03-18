
<?php
if(isset($_POST['create_post'])) {
    $post_category_id = $_POST['post_category'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_date = date('d-m-y');
    
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    
    $post_content = $_POST['post_content'];
    $post_tags = $_POST['post_tags'];
    
    $post_status = $_POST['post_status'];
    $post_comment_count = 4;
    
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO post(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
        
    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";
    
    $create_didPost_query = mysqli_query($connection, $query);
    
    didQueryWork($create_didPost_query);
  
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <!-- Post Title -->
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

     <!-- Select Category -->
    <div class = "form-group">
        
        <label for="post_title">Select Category</label>
        <select name="post_category" id="">

            <?php 
            //1
            $query = "SELECT * FROM categories";
            $selected_categories = mysqli_query($connection, $query);

            didQueryWork($selected_categories);
        
            while($row = mysqli_fetch_assoc($selected_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
                echo"<option value='$cat_id'>{$cat_title}</option>";      
            }
            
            ?>

        </select>

    </div>

    <!-- Post Author -->
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>

    <!-- Post Status -->
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>

    <!-- Post Image -->
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="post_image">
    </div>

    <!-- Post Tags -->
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <!-- Post Content -->
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
        </textarea>
    </div>

    <!-- Create Button -->
    <div class = "form-group">
        <input class ="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>


</form>