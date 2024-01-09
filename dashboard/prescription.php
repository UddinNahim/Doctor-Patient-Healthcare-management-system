<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php
if(isset($_POST['btn_submit'])) {
    $patient_name  = $_POST['patient_name'];
    $medicine_name = $_POST['medicine_name'];
    $dose          = $_POST['dose'];
    $status        = $_POST['status'];
    $note          = $_POST['note'];
    if(isset($_GET['editid'])) {
        $id            = $_GET['editid'];
        $sql           = "UPDATE prescriptions SET patient_name='$patient_name',medicine_name='$medicine_name',dose='$dose',note='$note',status='$status' WHERE id='$id'";
        if($qsql = mysqli_query($conn, $sql)) {
    ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
        <h3 class="popup__content__title">
            Success
        </h3>
        <p>Prescription record updated successfully</p>
        <p>
            <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
            <?php echo "<script>setTimeout(\"location.href = 'view-prescription.php';\",1500);</script>"; ?>
        </p>
    </div>
</div>
<?php
                        //echo "<script>alert('Treatment record updated successfully...');</script>";
                        //echo "<script>window.location='view-treatment.php';</script>";
        } else {
            echo mysqli_error($conn);
        }
    } else {
        $sql    = "INSERT INTO prescriptions (`patient_name`,`medicine_name`,`dose`,`status`,`note`) values('$patient_name','$medicine_name','$dose','$status','$note')";
        if (mysqli_query($conn, $sql)) {
            ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
        <h3 class="popup__content__title">
            Success
        </h3>
        <p>Prescription record inserted successfully.</p>
        <p>
             <a href=""><button class="button button--success" data-for="js_success-popup">Ok</button></a>
            <!-- <?php echo "<script>setTimeout(\"location.href = 'view-prescription.php';\",1500);</script>"; ?> -->
        </p>
    </div>
</div>
    <?php
        } else {
            echo mysqli_error($conn);
        }
    }
}
    if (isset($_GET['editid'])) {
        $sql = mysqli_query($conn, "SELECT * FROM prescriptions WHERE id='$_GET[editid]' ");
        $rsedit = mysqli_fetch_array($sql);
    }
    ?>

<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Add Prescription</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Prescription</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Add Prescription</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-block">
                                    <form id="main" method="post" action="" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <?php 
                                            $query = mysqli_query($conn, "SELECT * FROM appointment_info");
                                            $patients = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                            ?>
                                            <label class="col-sm-2 col-form-label">Patient Name</label>
                                            <div class="col-sm-8">
                                                <select name="patient_name" id="patient_name" class="form-control" required="">
                                                    <option value="">-- Select One -- </option>
                                                    <?php foreach($patients as $patient): ?>
                                                    <option <?php if(isset($_GET['editid'])) {
                                                        if($rsedit['patient_name'] == $patient['P_name']) {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="<?php echo $patient['P_name']; ?>" ><?php echo $patient['P_name']; ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <?php 
                                            $query = mysqli_query($conn, "SELECT * FROM medicine");
                                            $medicines = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                            ?>
                                            <label class="col-sm-2 col-form-label">Medicine Name</label>
                                            <div class="col-sm-8">
                                                <select name="medicine_name" id="medicine_name" class="form-control" required="">
                                                    <option value="">-- Select One -- </option>
                                                    <?php foreach($medicines as $med): ?>
                                                    <option <?php if(isset($_GET['editid'])) {
                                                        if($rsedit['medicine_name'] == $med['medicinename']) {
                                                            echo 'selected';
                                                        }
                                                    } ?> value="<?php echo $med['medicinename']; ?>" ><?php echo $med['medicinename']; ?> </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Dose</label>
                                            <div class="col-sm-8">
                                                <input type="text" placeholder="1-0-1" min="0" class="form-control" name="dose"
                                                    id="dose"
                                                    value="<?php if(isset($_GET['editid'])) {
                                                        echo $rsedit['dose'];
                                                    } ?>" />
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select name="status" id="status" class="form-control" required="">
                                                    <option value="">-- Select One -- </option>
                                                    <option value="active" <?php if(isset($_GET['editid'])) {
                                                        if($rsedit['status'] == 'active') {
                                                            echo 'selected';
                                                        }
                                                    } ?>>Active
                                                    </option>
                                                    <option value="inactive" <?php if(isset($_GET['editid'])) {
                                                        if($rsedit['status'] == 'inactive') {
                                                            echo 'selected';
                                                        }
                                                    } ?>>Inactive
                                                    </option>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Note</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="note"
                                                    id="note"><?php if(isset($_GET['editid'])) {
                                                        echo $rsedit['note'];
                                                    } ?></textarea>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="btn_submit"
                                                    class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("#dose").mask("0-0-0", {
            placeholder: "1-0-1"
        });
    });
</script>
<?php include('footer.php');?>