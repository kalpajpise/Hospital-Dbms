<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">Hospital </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo " ". $_SESSION[ 'login_name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i>Edit Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="include/recep_logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="./categories.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Categories</a>
                    </li>
                    <li>
                        <a href="./employee.php"><i class="fa fa-users" aria-hidden="true"></i></i> Employee</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fas fa-user-injured"></i>      Patient<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="./patient.php">Veiw Patient</a>
                            </li>
                            <li>
                                <a href="./patient.php?source=add_patient">New Registration</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./room.php"><i class="fas fa-hospital"></i> Rooms</a>
                    </li>
                     <li>
                        <a href="./payment.php"><i class="fas fa-file-invoice"></i>  Payment</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>