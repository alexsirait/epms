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

        <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
               <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                   Year</div>
                   <div class="h3 mb-0 font-weight-bold text-gray-800"><?php $today= date("d-m-Y"); echo $today; ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-calendar fa-5x text-gray-300"></i>
               </div>
             </div>
           </div>
         </div>
       </div>
       
       

     <!-- Earnings (Annual) Card Example -->
     <?php if (@$_SESSION['level_id'] == '2') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                   Direct Leader</div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $direct_leader ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>Home/direct_leader" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>

       <!--  -->

     <?php } ?>

     <!-- Tasks Card Example -->
     <?php if (@$_SESSION['level_id'] == '3') { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dept Manager / HOD
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $manager ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>Home/hod" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
     <?php } ?>

     <?php if (@$_SESSION['level_id'] == '2'||@$_SESSION['level_id'] == 3) { ?>
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Dept. Finance & Accounting
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dept_finance ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>finance/hrd_finance" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
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