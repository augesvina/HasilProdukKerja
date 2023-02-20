<!--Counter Inbox-->
<!--Counter Inbox-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Pengguna</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>" />

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">

            <!-- Logo -->
            <a href="" class="logo">
                
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">ADMINISTRATOR</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        

                        <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
          ?>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>"
                                    class="user-image" alt="">
                                <span class="hidden-xs"><?php echo $c['pengguna_nama'];?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>"
                                        class="img-circle" alt="">

                                    <p>
                                        <?php echo $c['pengguna_nama'];?>
                                        <?php if($c['pengguna_level']=='1'):?>
                                        <small>Administrator</small>
                                        <?php else:?>
                                        <small>Author</small>
                                        <?php endif;?>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?php echo base_url().'administrator/logout'?>"
                                            class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>