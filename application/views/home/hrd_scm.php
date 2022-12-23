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
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : Consumable
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_consumable ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>scm/sect_consumable" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
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
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : Logistics
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_logistics ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>scm/sect_logistics" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
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
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : Material
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_material ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>scm/sect_material" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
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
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : Purchasing
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_purchasing ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>scm/sect_purchasing" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
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
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : Store
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_store ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>scm/sect_store" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
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
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Section : Supply Chain Management
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sect_scm ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>scm/sect_scm" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
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