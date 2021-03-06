<!DOCTYPE html>
<html>
    <head>
        <title>View Standards</title>
        <?php $this->load->view("head"); ?>
    </head>
    <style type="text/css">
        .row {
            margin-left: 0px;
        }
         #head.secondary{
        min-height: 40px;
        height: 40px !important;
        margin-top:10px;
        padding-bottom: 25px;
    }
    h2{
        margin-top: -07px;
    }
    </style>
    <body>
        <!--  wrapper -->
        <div id="wrapper">
            <!-- navbar top -->
            <?php $this->load->view("top"); ?>
            <!-- end navbar top -->
            <header id="head" class="secondary">
            
                <h2>Standards</h2>
            
        </header>
            <!-- navbar side -->
            <?php $this->load->view("panel1"); ?>
            

            <div class="container col-sm-9">
                
            
            <div id="page-wrapper">
                <div class="row col-sm-12" >
                    <!-- Page Header -->
                    <div class="col-sm-10" style="margin-top: -20px;">
                        <div class="page-header">
                            
                            <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                            <li>Standards</li>
                            <li class="active">All Standards</li>
                            </ol>
                        </div>
                    </div>
                    <!--End Page Header -->

                    <div class="col-sm-2" style="margin-top: 10px;">
                        <a href="#" data-toggle="modal" data-target="#AddStandard" class="btn btn-sm btn-default">Add New Standard</a>
                    </div>

                <div class="row">
                    <div class="col-lg-8" style="padding-right: 0px;">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            
                            <!-- Welcome -->
                            <div class="panel-body">

                                <?php if (isset($_SESSION['StandardAdded'])) {
                                if ($_SESSION['StandardAdded'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                <?php unset($_SESSION['StandardAdded']); }  else { ?>
                                    <div class="alert alert-danger"><?php echo $_SESSION['StandardAdded']; ?></div>
                                <?php unset($_SESSION['StandardAdded']); } } ?>


                                <?php if (isset($_SESSION['StandardDeleted'])) {
                                if ($_SESSION['StandardDeleted'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record Delete Succesfully" ?></div>
                                <?php unset($_SESSION['StandardDeleted']); } else { ?>
                                    <div class="alert alert-success"><?php echo "Something went wrong. Please try again." ?></div>
                                <?php unset($_SESSION['StandardDeleted']); } } ?>


                                <?php if (isset($_SESSION['StandardUpdated'])) {
                                if ($_SESSION['StandardUpdated'] == '1') { ?>
                                    <div class="alert alert-success"><?php echo "Record updata Succesfully" ?></div>
                                <?php unset($_SESSION['StandardUpdated']); } else { ?>
                                    <div class="alert alert-danger"><?php echo $_SESSION['StandardUpdated'] ?></div>
                                <?php unset($_SESSION['StandardUpdated']); } } ?>

                                <?php if(isset($res)) {?>
                                <div class="table-responsive col-sm-12">

                                    <table id="example" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Standard</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($res as $value) {?>

                                            <tr>
                                                <td><?php echo $no; $no++?></td>
                                                <td><?php echo $value->standard;?></td>
                                                <td>
                                                    <a href="<?php echo base_url("index.php/Standard_Controller/EditStandard/$value->standard_id")?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil update"></i></a>&nbsp;&nbsp;&nbsp;
                                                    <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php  echo base_url("index.php/Standard_Controller/DeleteStandard/$value->standard_id")?>" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="fa fa-trash-o delete"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>

                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <?php $this->load->view("footer"); ?>

         <!-- Add Subject Modal -->
        <div id="AddStandard" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New Standard</h4>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url("index.php/Standard_Controller/InsertStandard") ?>" method="POST" role="form">
                <table class="table table-bordered table-hover">
                  <tbody>
                    <tr>
                      <td>Standard</td>
                      <td><input type="text" name="StandardName" required></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        <input type="submit" class="btn btn-default" name="add_standard" value="Add">
                      </td>
                    </tr>
                  </tbody>
                </table>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
        <!-- Add Subject Modal Ends -->
        <script>
            $(function () {
                $("#example").dataTable();
            })
        </script>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>
</html>





