<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php
if(isset($_POST['btn_submit'])) {
    if(isset($_GET['editid'])) {

        $id = $_GET['editid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $note = $_POST['note'];
        $status = $_POST['status'];
        $type = $_POST['type'];
        $sql ="UPDATE treatment SET type='$type',name='$name',price='$price',note='$note',status='$status' WHERE id='$id'";
        if($qsql = mysqli_query($conn, $sql)) {
?>
<div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
        <h3 class="popup__content__title">
            Success
        </h3>
        <p>Service record updated successfully</p>
        <p>
            <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
            <?php echo "<script>setTimeout(\"location.href = 'view-treatment.php';\",1500);</script>"; ?>
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
        $name = $_POST['name'];
        $price = $_POST['price'];
        $note = $_POST['note'];
        $status = $_POST['status'];
        $type = $_POST['type'];
        $sql ="INSERT INTO treatment (`name`,`price`,`note`,`status`,`type`) values('$name','$price','$note','$status','$type')";
        if (mysqli_query($conn, $sql)) {
            ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
    <div class="popup__background"></div>
    <div class="popup__content">
        <h3 class="popup__content__title">
            Success
        </h3>
        <p>Service record inserted successfully.</p>
        <p>
            <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
            <?php echo "<script>setTimeout(\"location.href = 'view-treatment.php';\",1500);</script>"; ?>
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
        $sql="SELECT * FROM treatment WHERE id='$_GET[editid]' ";
        $qsql = mysqli_query($conn, $sql);
        $rsedit = mysqli_fetch_array($qsql);

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
                                    <h4>Add Service</h4>
                                    <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Service</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Add Service</a>
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
                                    <!-- <h5>Basic Inputs Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                </div>
                                <div class="card-block">
                                    <form id="main" method="post" action="" enctype="multipart/form-data">

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Service Type</label>
                                            <div class="col-sm-8">
                                                <select name="type" id="type" class="form-control" required="">
                                                    <option value="">-- Select One -- </option>

                                                    <option value="Diagnostics" <?php if (isset($_GET['editid']) && $rsedit['type'] == 'Diagnostics') { echo 'selected'; }?> >Diagnostics</option>
                                                    <option value="Consultation" <?php if (isset($_GET['editid']) && $rsedit['type'] == 'Consultation') { echo 'selected'; }?> >Consultation</option>
                                                    <option value="E-Pharmacy" <?php if (isset($_GET['editid']) && $rsedit['type'] == 'E-Pharmacy') { echo 'selected'; }?> >E-Pharmacy</option>
                                                    
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Name</label>
                                            <div class="col-sm-8">
                                                <input type="search" class="form-control" name="name"
                                                    id="name"
                                                    value="<?php if(isset($_GET['editid'])) {
                                                        echo $rsedit['name'];
                                                    } ?>">
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"> Cost</label>
                                            <div class="col-sm-8">
                                                <input type="number" min="0" class="form-control" name="price"
                                                    id="price"
                                                    value="<?php if(isset($_GET['editid'])) {
                                                        echo $rsedit['price'];
                                                    } ?>" />
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-8">
                                                <select name="status" id="status" class="form-control" required="">
                                                    <option value="">-- Select One -- </option>
                                                    <option value="Active" <?php if(isset($_GET['editid'])) {
                                                        if($rsedit['status'] == 'Active') {
                                                            echo 'selected';
                                                        }
                                                    } ?>>Active
                                                    </option>
                                                    <option value="Inactive" <?php if(isset($_GET['editid'])) {
                                                        if($rsedit['status'] == 'Inactive') {
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

<?php include('footer.php');?>