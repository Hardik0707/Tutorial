<!DOCTYPE html>
<head>
    <title>Tution Classes | Admin</title>
    <?php $this->load->view("head"); ?>
    <style type="text/css">
        .subject {
            margin-bottom: unset;
        }
        .table-bordered .subject  > tbody > tr > td  {
            line-height: 1;
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
</head>
<body>
    <div id="wrapper">
        <!--header start-->
        <?php $this->load->view("top"); ?>

        <header id="head" class="secondary">
            
                <h2>Faculty</h2>
            
        </header>
        <!--header end-->
        <!--sidebar start-->

        <?php $this->load->view("panel1"); ?>
        <!--sidebar end-->
        <!--main content start-->
        <div class="container col-sm-9">
        <div id="page-wrapper">
            <div class="row col-sm-12">
                <!-- Page Header -->
                <div class="col-sm-10" style="margin-top: -20px;">
                    <div class="page-header">
                        
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url("index.php/Login_Controller/Home"); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                           
                            <li class="active">Faculty</li>
                        </ol>
                      </div>
                </div>

                <div class="col-sm-2" style="margin-top: 10px">
                    <a href="<?php echo base_url("index.php/Faculty_Controller/AddFaculty"); ?>" class="btn btn-sm btn-default">Add New Faculty</a>
                </div>
            </div>
                <!--End Page Header -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <?php
                        if (isset($_SESSION['InsertFaculty'])) {
                            if ($_SESSION['InsertFaculty'] == '1') {
                                ?>
                                <div class="alert alert-success"><?php echo "Record Added Succesfully" ?></div>
                                <?php
                                unset($_SESSION['InsertFaculty']);
                            } else {
                                ?>
                                <div class="alert alert-success"><?php echo "Record not added" ?></div>
                                <?php
                                unset($_SESSION['InsertFaculty']);
                            }
                        }
                        if (isset($_SESSION['activedeactive'])) {
                            if ($_SESSION['activedeactive'] == '1') {
                                ?>
                                <div class="alert alert-success"><?php echo "Record Deactivated  Successfully" ?></div>
                                <?php
                                unset($_SESSION['activedeactive']);
                            } else {
                                ?>
                                <div class="alert alert-success"><?php echo "Record Activated Successfully" ?></div>
                                <?php
                                unset($_SESSION['activedeactive']);
                            }
                        }
                        if (isset($_SESSION['Deletefaculty'])) {
                            if ($_SESSION['Deletefaculty'] == '1') {
                                ?>
                                <div class="alert alert-success"><?php echo "Record Delete  Succesfully" ?></div>
                                <?php
                                unset($_SESSION['Deletefaculty']);
                            } else {
                                ?>
                                <div class="alert alert-success"><?php echo "Record not Deleted" ?></div>
                                <?php
                                unset($_SESSION['Deletefaculty']);
                            }
                        }
                          if (isset($_SESSION['updateFaculty'])) {
                            if ($_SESSION['updateFaculty'] == '1') {
                                ?>
                                <div class="alert alert-success"><?php echo "Record Update  Succesfully" ?></div>
                                <?php
                                unset($_SESSION['updateFaculty']);
                            } else {
                                ?>
                                <div class="alert alert-success"><?php echo "Record not Updated" ?></div>
                                <?php
                                unset($_SESSION['updateFaculty']);
                            }
                        }
                        ?>
                        <!-- Welcome -->
                            <div class="panel-body">
                                <div class="table-responsive col-sm-12">
                                    <table id="example" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Faculty Name</th>
                                                <th>Exp</th>
                                                <th>Degree</th>
                                                <th>Subjects</th>
                                                <th>Email</th>
                                                <th>Faculty Photo</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                            <?php if (isset($AllFaculties)) { ?>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($AllFaculties as $value) {
                                                    $faculties = 's_'.$value->faculty_id;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no;
                                                    $no++;
                                                    ?></td>
                                                        <td><?php echo $value->faculty_name ?></td>
                                                        <td><?php echo $value->experience. " Years"; ?> </td>
                                                        <td><?php echo $value->degree; ?></td>
                                                        <td>
                                                            <?php if(count($$faculties) > 1) { ?>
                                                            <table class="table table-bordered subject">
                                                            <?php foreach ($$faculties as $faculty) {
                                                                //print_r($faculty);
                                                                echo "<tr>";
                                                                echo "<td>".$faculty->standard."</td>";
                                                                echo "<td>".$faculty->subjects."</td>";
                                                                echo "</tr>";
                                                            } ?>
                                                            </table>
                                                            <?php } else {
                                                            foreach ($$faculties as $faculty) {
                                                                echo $faculty->standard." : ".$faculty->subjects;
                                                            } } ?>
                                                        </td>
                                                        <td><?php echo $value->email;?></td>
                                                        <td><img src=" <?php echo base_url("panel/img/Faculty/$value->photo");?>" width="75px" height="75px"></td>
                                                        <td>
                                                            <?php if($value->active=='0') {?>
                                                            <a  href="<?php echo base_url("index.php/Faculty_Controller/activedeactive/$value->faculty_id/$value->active");?>" data-toggle="tooltip" data-placement="top" title="Unhide"> <i class="fa fa-eye-slash"></i></a>
                                                            <?php }  else {?>
                                                                <a href="<?php echo base_url("index.php/Faculty_Controller/activedeactive/$value->faculty_id/$value->active");?>" data-toggle="tooltip" data-placement="top" title="Hide"> <i class="fa fa-eye"></i></a>
                                                               <?php }?>

                                                            <a href="<?php echo base_url("index.php/Faculty_Controller/EditFaculty/$value->faculty_id");?>"><i class="fa fa-pencil update" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>&nbsp;
                                                            <a  onclick="return confirm('Are You Sure Remove This Record ');" href="<?php echo base_url("index.php/Faculty_Controller/Deletefaculty/$value->faculty_id");?>" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="fa fa-trash-o delete"></i>
                                                            </a>
                                                        </td>

                                                </tr>
    <?php } ?>
                                        </tbody>
<?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $this->load->view("footer"); ?>
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
