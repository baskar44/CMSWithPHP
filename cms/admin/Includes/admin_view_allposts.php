

<!-- This table will list all the existing posts -->
<table class = "table table-bordered table-hover"> 
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Content</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comment Count</th>
            <th>Date</th>
        </tr>
    </thead>  
    <tbody>

        <!-- Getting all posts from DB and displaying it in the table -->
        <?php
        get_allposts_and_display_in_table();
        ?>

    </tbody> 
</table>

<?php 


if(isset($_GET['delete'])){
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM post WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection, $query);
    
    didQueryWork($delete_query);
    header("Refresh:0; url=admin_posts.php");
}


?>
