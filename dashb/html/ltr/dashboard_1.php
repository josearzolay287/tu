<?php
include ('conexion.php'); 
    //$id_=$_SESSION['id_usuario'];
    //$consulta_edit_mixes=mysqli_query($conexion, "SELECT * FROM mixes WHERE id_usuario='$id_'") or die(mysqli_error($conexion));
    //$count_edit_mixes= mysqli_num_rows($consulta_edit_mixes);
    //$consulta_ediciones=mysqli_query($conexion, "SELECT * FROM ediciones WHERE id_usuario='$id_'") or die(mysqli_error($conexion));
    //$count_ediciones= mysqli_num_rows($consulta_ediciones);
    //$consulta_packs=mysqli_query($conexion, "SELECT * FROM packs WHERE id_usuario='$id_'") or die(mysqli_error($conexion));
    //$count_packs= mysqli_num_rows($consulta_packs);
    //$consulta_eventos=mysqli_query($conexion, "SELECT * FROM eventos WHERE id_usuario='$id_'") or die(mysqli_error($conexion));
    //$count_eventos= mysqli_num_rows($consulta_eventos);
?>


  <div class="row">
      <div class="col-xl-3 col-lg-6 col-xs-12">
          <div class="card">
              <div class="card-body">
                  <div class="media">
                      <div class="p-2 text-xs-center bg-cyan bg-darken-2 media-left media-middle">
                          <i class="icon-camera7 font-large-2 white"></i>
                      </div>
                      <div class="p-2 bg-cyan white media-body">
                          <h5>---</h5>
                          <h5 class="text-bold-400">---</h5>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-xs-12">
          <div class="card">
              <div class="card-body">
                  <div class="media">
                      <div class="p-2 text-xs-center bg-deep-orange bg-darken-2 media-left media-middle">
                          <i class="icon-user1 font-large-2 white"></i>
                      </div>
                      <div class="p-2 bg-deep-orange white media-body">
                          <h5>Usuarios Registrados</h5>
                          <h5 class="text-bold-400" id="usuarios_registrados_ocunt"></h5>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-lg-6 col-xs-12">
          <div class="card">
              <div class="card-body">
                  <div class="media">
                      <div class="p-2 text-xs-center bg-teal bg-darken-2 media-left media-middle">
                          <i class="icon-android-options font-large-2 white"></i>
                      </div>
                      <div class="p-2 bg-teal white media-body">
                          <h5>--</h5>
                          <h5 class="text-bold-400">--  </h5>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
          <div class="card">
              <div class="card-body">
                  <div class="media">
                      <div class="p-2 text-xs-center bg-pink bg-darken-2 media-left media-middle">
                          <i class="icon-layers font-large-2 white"></i>
                      </div>
                      <div class="p-2 bg-pink white media-body">
                          <h5>--</h5>
                          <h5 class="text-bold-400">--</h5>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--/ Statistics -->
  <!--project Total Earning, visit & post-->
 <!-- <div class="row">
      <div class="col-xl-4 col-lg-12">
          <div class="card">
              <div class="card-body">
                  <div class="earning-chart position-relative">
                      <div class="chart-title position-absolute mt-2 ml-2">
                          <h1 class="display-4">##</h1>
                          <span class="text-muted">-----</span>
                      </div>
                      <canvas id="earning-chart" class="height-450 block"></canvas>
                     
                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-8 col-lg-12">
          <div class="card">
              <div class="card-body">
                  <div class="card-block">
                      <canvas id="posts-visits" class="height-400">---</canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>-->
  <!--/project Total Earning, visit & post-->
  <!-- projects table with monthly chart -->
  <div class="row">
      <div class="col-xl-8 col-lg-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">
                  <?php 
                      if ($_SESSION["tipo_user"]==1 || $_SESSION["tipo_user"]==2) {
                          echo "Usuarios en sistema" ;
                      }else{
                        
                      }
                      
                      
                      ?></h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                  <div class="heading-elements">
                      <ul class="list-inline mb-0">
                          <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                          <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                      </ul>
                  </div>
              </div>
              <div class="card-body">
                  <div class="card-block">
                      <p class="m-0"></p>
                  </div>
                  <div class="table-responsive" id="get_usuarios">

                      <?php 
                      if ($_SESSION["tipo_user"]==1 || $_SESSION["tipo_user"]==2) {
                          include ('paginador_usuarios_index_dash.php'); 
                      }else{
                        
                      }
                      
                      
                      ?>



                  </div>
              </div>
          </div>
      </div>
      <div class="col-xl-4 col-lg-12">
          <div class="card bg-cyan">
              <div class="card-body">
                  <div class="card-block">
                      <div class="media">
                          <div class="media-left media-middle">
                              <i class="icon-pencil white font-large-2 float-xs-left"></i>
                          </div>
                          <div class="media-body white text-xs-right">
                              <h3>--</h3>
                              <span>--</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--<div class="card bg-teal">
              <div class="card-body">
                  <div class="card-block">
                      <div class="media">
                          <div class="media-body white text-xs-left">
                              <h3></h3>
                              <span></span>
                          </div>
                          <div class="media-right media-middle">
                              <i class="icon-layers white font-large-2 float-xs-right"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>-->
          <!-- <div class="card bg-deep-orange">
              <div class="card-body">
                  <div class="card-block">
                      <div class="media">
                          <div class="media-left media-middle">
                              <i class="icon-android-options white font-large-2 float-xs-left"></i>
                          </div>
                          <div class="media-body white text-xs-right">
                              <h3></h3>
                              <span></span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>-->
          <!--<div class="card bg-cyan">
              <div class="card-body">
                  <div class="card-block">
                      <div class="media">
                          <div class="media-body white text-xs-left">
                              <h3>##</h3>
                              <span>----</span>
                          </div>
                          <div class="media-right media-middle">
                              <i class="icon-ios-help-outline white font-large-2 float-xs-right"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>-->
      </div>
  </div>
  <!--/ projects table with monthly chart -->
  <div class="row match-height">
     
 
      <!--<div class="col-xl-4 col-md-12 col-sm-12">
          <div class="card">
              <div class="card-body">
                  <div class="card-block">
                      <h4 class="card-title">Contact Form</h4>
                      <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                  </div>
                  <div class="card-block">
                      <form class="form">
                          <div class="form-body">
                              <div class="form-group">
                                  <label for="donationinput1" class="sr-only">Name</label>
                                  <input type="text" id="donationinput1" class="form-control" placeholder="name" name="name">
                              </div>
                              <div class="form-group">
                                  <label for="donationinput2" class="sr-only">Email</label>
                                  <input type="email" id="donationinput2" class="form-control" placeholder="email" name="email">
                              </div>
                              <div class="form-group">
                                  <label for="donationinput7" class="sr-only">Message</label>
                                  <textarea id="donationinput7" rows="5" class="form-control square" name="message" placeholder="message"></textarea>
                              </div>
                          </div>
                          <div class="form-actions center">
                              <button type="submit" class="btn btn-outline-primary">Send</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>-->
  </div>

      <!-- ////////////////////////////////////////////////////////////////////////////-->
  
  