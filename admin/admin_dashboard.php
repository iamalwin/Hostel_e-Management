<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Hostel Management System</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../dist/css/style.min.css">
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
  rel="stylesheet"
/>


</head>

<body>
    
    <!-- Preloader - style you can find in spinners.css -->
    
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    
    <!-- Main wrapper - style you can find in pages.scss -->
    
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
     
        <!-- Topbar header - style you can find in pages.scss -->
     
        <header class="topbar" data-navbarbg="skin6">
            <?php include './include/navbar.php'?>
        </header>
     
        <!-- End Topbar header -->
     
     
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
     
        <aside class="" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <?php include './include/sidebar.php'?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
     
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
     
     
        <!-- Page wrapper  -->
     
        <div class="page-wrapper">
    
            <!-- Bread crumb and right sidebar toggle -->
    
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                       <?php include 'includes/greetings-a.php'?>
                        <div class="d-flex align-items-center">
                            <!-- <nav aria-label="breadcrumb">
                                
                            </nav> -->
                        </div>
                    </div>
                    
                </div>
            </div>
    
            <!-- End Bread crumb and right sidebar toggle -->
    
    
            <!-- Container fluid  -->
    
            <div class="container-fluid">
     
                <!-- Start First Cards -->
     
                <div class="card-group m-3">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php include 'counters/student-count.php'?></h2>
                                
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Registered Students</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?php include 'counters/room-count.php'?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Rooms
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="grid"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php include 'counters/booked-count.php'?></h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Booked Rooms</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="book-open"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php include 'counters/course-count.php'?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Featured Courses</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
     
                <!-- End First Cards -->
     


                <div class="col-12">
                        <div class="card">
                            
                            <div class="card-body">
                            
                            <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <!-- <th scope="col">User ID</th> -->
                                            <th scope="col">Student's Email</th>
                                            <th scope="col">Last Activity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php	
                                        $aid=$_SESSION['id'];
                                        $ret="SELECT * from userlog ORDER BY loginTime DESC";
                                        $stmt= $mysqli->prepare($ret) ;
                                        $stmt->execute() ;
                                        $res=$stmt->get_result();
                                        $cnt=1;
                                        while($row=$res->fetch_object()) {
                                                ?>
                                        <tr><td><?php echo $cnt;;?></td>
                                        <!-- <td><?php echo $row->userId;?></td> -->
                                        <td><?php echo $row->userEmail;?></td>
                                        <td><?php echo $row->loginTime;?></td>
                                            </tr>
                                            <?php
                                        $cnt=$cnt+1;
                                            } ?>
											
										
									</tbody>
                                </table>
                            </div>
                            
                            </div>
                        
                        </div>
                    </div>
                
               
            </div>
    
            <!-- End Container fluid  -->
    
    
            <!-- footer -->
    
            <?php include '../includes/footer.php' ?>
    
            <!-- End footer -->
    
        </div>
     
        <!-- End Page wrapper  -->
     
    </div>
    

</body>

</html>