 <!-- Begin Page Content -->
 <div class="container-fluid">

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800"></h1>
   </div>
   <div class="alert alert-info" >
  <h4><center><strong>-- Performance Management System --</strong></h4></center>
  <div class="px-2 bg-light "><marquee class="py-3">Welcome To Cladtek Performance Management System</marquee></div>

<br>
   <div class="row">


     <?php if (@$_SESSION['level_id'] == '2' ||@$_SESSION['level_id'] == '3' ||@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : General Affair
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_ga ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>prodauto/sect_ga" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>

     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '2' ||@$_SESSION['level_id'] == '3' ||@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : Electrical Controller System
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_ecs ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>prodauto/sect_ecs" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '2' ||@$_SESSION['level_id'] == '3' ||@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : Engineering & Automation
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_ea ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>prodauto/sect_ea" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '2' ||@$_SESSION['level_id'] == '3' ||@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : Production Automation
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_prodauto ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>prodauto/sect_prodauto" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '2' ||@$_SESSION['level_id'] == '3' ||@$_SESSION['level_id'] == '4') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : System Development
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_sd ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>prodauto/sect_sd" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

   </div>

 </div>
 <!-- /.container-fluid -->
 </div>
 </div>

 <!-- End of Main Content -->