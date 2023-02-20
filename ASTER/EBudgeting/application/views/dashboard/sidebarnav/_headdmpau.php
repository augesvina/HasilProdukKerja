 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-dark bg-lightblue ">
   <!-- Left navbar links -->
   <ul class="navbar-nav">
     <li class="nav-item">
       <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="<?php echo site_url('C_login') ?>">Home</a>
     </li>


   </ul>

   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">





     <!-- Notifications Dropdown Menu -->
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="far fa-bell"></i>
         <span class="badge badge-warning navbar-badge"><?php echo  $this->session->userdata('totalnotifikasi'); ?></span>
       </a>
       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <span class="dropdown-item dropdown-header">Anda memiliki <?php echo  $this->session->userdata('totalnotifikasi'); ?> notifikasi</span>
         <div class="dropdown-divider"></div>
         <?php foreach ($this->session->userdata('dm') as $iddm) : ?>
           <a href="<?php echo site_url('C_persetujuan_dmpau/show_pengajuandmpau?id=') . $iddm['id_pengajuan']; ?>" class="dropdown-item  row">
             <p class="col-md-10"> <?= 'Pengajuan No ' . $iddm['id_pengajuan'] . ' disetujui oleh DM!'; ?></p>

             <a href="<?php echo site_url('C_login/hapus_notifikasi/') . $iddm['id_pengajuan']; ?>" class="btn btn-block btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>



           </a>

           <div class="dropdown-divider"></div>
         <?php endforeach; ?>



         <?php foreach ($this->session->userdata('koreksi')  as $iddm) : ?>
           <a href="<?php echo site_url('C_persetujuan_dmpau/show_pengajuandmpau?id=') . $iddm['id_pengajuan']; ?>" class="dropdown-item  row">
             <p class="col-md-10"> <?= 'Pengajuan No ' . $iddm['id_pengajuan'] . ' Memerlukan koreksi'; ?></p>

             <a href="<?php echo site_url('C_login/hapus_notifikasi/') . $iddm['id_pengajuan']; ?>" class="btn btn-block btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>



           </a>

         <?php endforeach; ?>
       </div>
     </li>

     <!-- User Account -->
     <li class="nav-item dropdown">
       <a class="nav-link" data-toggle="dropdown" href="#">
         <i class="fa-solid fa-user"></i>

       </a>

       <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
         <div class="card card-widget widget-user">
           <!-- Add the bg color to the header using any of the bg-* classes -->
           <div class="widget-user-header bg-lightblue">
             <h3 class="widget-user-username"><?php echo $this->session->userdata('nama_anggota'); ?></h3>
             <h5 class="widget-user-desc">Account - DMPAU/Admin</h5>
           </div>
           <div class="widget-user-image">
             <img class="img-circle elevation-2" src="<?php echo base_url('assets/'); ?>dist/img/user1-128x128.jpg" alt="User Avatar">
           </div>
           <div class="card-footer">
             <div class="row">


               <div class="col-sm-12">
                 <div class="description-block">

                   <a class="description-text btn btn-block btn-danger" href="<?php echo site_url('C_login/logout_admin'); ?>">LOGOUT</a>

                 </div>
                 <!-- /.description-block -->
               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
         </div>

       </div>

     </li>


   </ul>
 </nav>
 <!-- /.navbar -->
 
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="<?php echo site_url('C_login/login_admin'); ?>" class="brand-link">
     <img src="<?php echo base_url('assets/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">E-Budgeting</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <div class="image">
         <img src="<?php echo base_url('assets/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div>
       <div class="info">
         <!-- nama orang -->
         <a href="#" class="d-block"><?php echo $this->session->userdata('nama_anggota'); ?></a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu">
         <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

         <li class="nav-item ">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Data Master
               <i class="right fas fa-angle-left"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="<?php echo site_url("C_input_jabatan/show_jabatan"); ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Jabatan</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="<?php echo site_url("C_user/show_user"); ?>" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Pegawai</p>
               </a>
             </li>
             <?php
              if (in_array("masterpos", $this->session->userdata('hakakses'))) {
                echo "<li class='nav-item'>
                <a href=" . site_url("C_masterpos_subpos/show_pos") . " class='nav-link'>
                  <i class='far fa-circle nav-icon'></i>
                  <p>Master Pos</p>
                </a>
              </li>";
              }
              ?>
             <?php
              if (in_array("mastersubpos", $this->session->userdata('hakakses'))) :

              ?>
               <li class="nav-item">
                 <a href="<?php echo site_url("C_masterpos_subpos/show_subpos"); ?>" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Master Sub Pos</p>
                 </a>
               </li>
             <?php endif; ?>
             <?php
              if (in_array("mastersubpos2", $this->session->userdata('hakakses'))) : ?>

               <li class="nav-item">
                 <a href="<?php echo site_url("C_masterpos_subpos/show_subpos2"); ?>" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Master Sub Pos Barang</p>
                 </a>
               </li>
             <?php endif; ?>
           </ul>
         </li>



         <!-- Pengajuananggaran -->
         <li class="nav-item">
           <a href="<?php echo site_url("C_persetujuan_dmpau"); ?>" class="nav-link">
             <i class="nav-icon fas fa-check"></i>
             <p>
               Persetujuan DMPAU
             </p>
           </a>
         </li>



         <!-- Rekapitulasi anggaran -->
         <?php if (in_array("rekapanggaran", $this->session->userdata('hakakses'))) { ?>
           <li class="nav-item ">
             <a href="#" class="nav-link">
               <i class="nav-icon fas fa-tachometer-alt"></i>
               <p>
                 Menu Rekapitulasi
                 <i class="right fas fa-angle-left"></i>
               </p>
             </a>
             <ul class="nav nav-treeview">
               <li class='nav-item'>
                 <a href="<?php echo site_url("C_ajuananggaran/show_rekapposanggaran"); ?>" class='nav-link'>
                   <i class='far fa-circle nav-icon'></i>
                   <p>Rekapitulasi Pos</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="<?php echo site_url("C_ajuananggaran/show_rekapitulasianggaran"); ?>" class="nav-link">
                   <i class="far fa-circle nav-icon"></i>
                   <p>Rekapitulasi anggaran</p>
                 </a>
               </li>


             </ul>
           </li>
         <?php } ?>
         <!-- Pagu Anggaran -->
         <li class="nav-item">
           <a href="<?php echo site_url("C_paguanggaran"); ?>" class="nav-link">
             <i class="nav-icon fas fa-laptop"></i>
             <p>
               Setting Pagu Anggaran
             </p>
           </a>
         </li>



         <!-- Menu transfer -->
         <?php if (in_array("menutransfer", $this->session->userdata('hakakses'))) : ?>
           <li class="nav-item">
             <a href="<?php echo site_url("C_menutransfer"); ?>" class="nav-link">
               <i class="nav-icon fas fa-th"></i>
               <p>
                 Menu Transfer
               </p>
             </a>
           </li>
         <?php endif; ?>

       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>