<?php 


function didQueryWork($query) {
    
    global $connection;
    
     if(!$query) {
        die("QUERY FAILED." . mysqli_error($connection));
    }
    
}

function insert_category() {

    global $connection;


    if(isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        }else {
            //sending data to database...
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);

            if(!$create_category_query) {
                //if send failed, kill with error.
                die('QUERY FAILED' .mysqli_error($connection));
            }
        }
    }
}


function delete_category(){

    global $connection;

    if(isset($_GET['delete'])) {
        $cat_delete_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$cat_delete_id}";

        $delete_query = mysqli_query($connection, $query);

        //whats happening here?... Refreshing the page...
        header("Location: admin_categories.php");
    }
}

function load_edit_category_space(){

    global $connection;

    //if getting a edit cat_id...
    if(isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];
        include "includes/admin_update_categories.php";
    }
}


function load_all_categories_for_table(){

    global $connection;

    //finding all categories
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories)) { 
        echo "<tr>";
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";

        //adding delete button...
        echo "<td> <a href ='admin_categories.php?delete= {$cat_id}'>Delete</a></td>";
        //adding edit button...
        echo "<td> <a href ='admin_categories.php?edit= {$cat_id}'>Edit</a></td>";
        echo "</tr>";
    } 
}


function update_category_title() {

    global $connection;

    if(isset($_POST['update_category_submit'])) {
        $cat_update_title = $_POST['cat_title'];

        $query = "UPDATE categories SET cat_title = '{$cat_update_title}' WHERE cat_id = {$cat_id}";

        $update_query = mysqli_query($connection, $query);

        if(!$update_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }
}



function create_editspace_and_setlabel(){

    global $connection;

    if(isset($_GET['edit'])) {
        $cat_edit_id = $_GET['edit'];

        $query = "SELECT * FROM categories WHERE cat_id = $cat_edit_id";

        $select_categories_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_categories_id)) { 
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];  

?>

<label for ="cat_title"> - <?php if(isset($cat_title)) {echo $cat_title;} ?></label>  
<input value ="" type = "text" class = "form-control" name = "cat_title">
<?php }}
}

function get_allposts_and_display_in_table() {
    
    global $connection;
    
    $query = "SELECT * FROM POST";
    $select_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_content = $row['post_content']; 
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];

        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_category_id}</td>";
        echo "<td>{$post_content}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td><img class='img-responsive' src='../images/$post_image' alt='image'></td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href ='admin_posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
    }
}

?>
