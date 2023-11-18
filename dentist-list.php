<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dentist Lists</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Dental Lab ARK</a>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <!-- Side bar -->
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="dentist-list.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-address-book"></i></div>
                                Dentist List
                            </a>
                            <a class="nav-link" href="transactions.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Transactions
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Juan Dela Cruz
                    </div>
                </nav>
            </div>

            <!-- Content of the Page -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">List of Dentists</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dentist List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div >
                                    <i class="fas fa-table me-1 ms-2"></i>
                                    Dentist List
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                        <i class="fa-solid fa-plus"></i>
                                        Add Dentist
                                    </button>
                                    <button type="button" class="btn btn-primary" href="test.php">
                                        <i class="fa-regular fa-circle-check"></i>
                                        Delete Dentist
                                    </button>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <?php
                                        require_once 'config.php' ;

                                        $sql = 'SELECT * FROM dentist_list';
                                        $result = $conn->query($sql);
                                        $arr_records = [];
                                        if ($result->num_rows > 0) {
                                            $arr_records = $result->fetch_all(MYSQLI_ASSOC);
                                        }
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Clinic Address</th>
                                            <th>Contact Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date of Transaction</th>
                                            <th>Client Name</th>
                                            <th>Nature of Case</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if(!empty($arr_records)) { ?>
                                            <?php foreach($arr_records as $record) { ?>
                                                <tr>
                                                    <td><?php echo $record['name']; ?></td>
                                                    <td><?php echo $record['clinic_address']; ?></td>
                                                    <td><?php echo $record['contact_num']; ?></td>
                                                    <td>Action</td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Add Transaction Pop-up Form -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add Dentist</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="add-dentist-f.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputName" name="inputName" type="text" placeholder="Enter Name" />
                                                <label for="inputEmail">Dentist Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputAddress" name="inputAddress" type="text" placeholder="Enter Address" />
                                                <label for="inputAddress">Clinic Address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputContact" name="inputContact" type="number" placeholder="Enter the Contact Information"/>
                                                <label for="inputContact">Contact Number</label>
                                            </div>
                                            <div class="text-center mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                                <i class="fa-solid fa-plus"></i>
                                                Add Transaction
                                            </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>   

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
