
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

                        <h1 class="page-header"> Posts
                            <small>Author</small>
                        </h1>
                        
                        <?php
                            
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        }else {
                            $source = '';
                        }
                                
                        switch($source) {
                        
                            case 'add_post';
                                include "includes/admin_add_post.php";
                            break;
                                
                            case 'edit_post';
                                include "includes/admin_edit_post.php";
                            break;
                                
                            case '200';
                            echo "NICE 200";
                            break;
                            
                            default:
                                include "includes/admin_view_allposts.php";
                            break;
                        }

                        ?>  
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

