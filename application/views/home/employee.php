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
       
       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                   DATA PMS</div>
                 <!--<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $manage_data ?></div> -->
                 <div class="h5 mb-0 font-weight-bold text-gray-800">2022</div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-table fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>home/personal2022" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>

       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">DATA PMS
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800">2021</div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>home/personal2021" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>
<!--
       <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-dark shadow h-100 py-2">
           <div class="card-body">
             <div class="row no-gutters align-items-center">
               <div class="col mr-2">
                 <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Count Data Gate Pass
                 </div>
                 <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $count_hrd ?></div>
               </div>
               <div class="col-auto">
                 <i class="fas fa-clipboard-list fa-5x text-gray-300"></i>
               </div>
             </div>
             <br>
             <a href="<?php echo base_url(); ?>Home/employee_hrd" class="small-box-footer">Details <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         </div>
       </div>-->
     
     
   </div>
 </div>
 <!-- /.container-fluid -->
 </div>
 </div>

 <!-- End of Main Content -->