
<!-- Header -->
<?php include "includes/admin_header.php" ?>


<body>

    <div id="wrapper">

        <!-- Check if connected to database -->

        <?php //if($connection) echo "connected" 
        ?>

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header"> Administration
                            <small>Author</small>
                        </h1>

                        <div class = "col-xs-6">
                           
                            <!-- Form - Add Category -->
                            <form action = "", method="post">
                                <div class = "form-group">

                                    <label for ="cat_title">Add  Category</label>  

                                    <input class = "form-control" type ="text" name ="cat_title">
                                </div>

                                <div class = "form-group">
                                    <input class = "btn btn-primary" type ="submit" name ="submit" value = "Add Category">
                                </div>

                            </form> <!-- Ending Form - Add Category -->
                            
                             <?php 
                            //inserting submitted category into database
                            insert_category(); 
                            ?>
                            
        
                            <?php 
                            //inserting edit space when a category is selected
                            //for editing...
                            load_edit_category_space();
                            ?>

                        </div> <!-- Add Category Form -->

                        <div class = "col-xs-6">

                            <table class = "table table-bordered table-hover">
                                <thread>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thread>

                                <tbody>
                                   
                                    <?php
                                    //loading all categories to put into table...
                                    load_all_categories_for_table();
                                    ?>


                                    <?php
                                    //deleting category...
                                    delete_category();
                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div> <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
