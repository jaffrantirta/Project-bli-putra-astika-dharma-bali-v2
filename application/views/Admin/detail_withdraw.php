<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Foto</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <strong>ORDER NUMBER</strong><br>
                            </div>

                            <h3 id="order_number" class="profile-username text-center"></h3>
                            <p hidden id="id_order"><?php echo $id_order ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Date</b> <a id="date" class="float-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Requested By</b> <a id="name" href="#" onclick="member_detail()" class="float-right"></a>
                                    <p hidden id="user_id"></p>
                                </li>
                                <li class="list-group-item">
                                    <b>Amount to transfer</b> <a id="withdraw_amount" class="float-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Auto Save Property</b> <a id="auto_amount" class="float-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a id="status" class="float-right"></a>
                                </li>
                                <li class="list-group-item">
                                    <b>USDT Wallet</b>
                                    <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button onclick="myFunction()" type="button" class="btn btn-info">Copy</button>
                                    </div>
                                    <input disabled id="usdt_wallet" class="form-control" value="">
                                    </div>
                                    <!-- <b>USDT Wallet</b> <input disabled class="col-4 form-control" id="usdt_wallet" value=""> <button class="btn btn-info" onclick="myFunction()"><i class="fa fa-copy" aria-hidden="true"></i></button> -->

                                </li>
                            </ul>
                            <div id="button_action" class="col-12">
                                
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="<?php echo base_url() ?>assets/build/js/customer/Jquery3Offline.js"></script>
<script src="<?php echo base_url() ?>assets/build/js/customer/SweetAlertOffline.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/build/js/customer/Totalbonus.js"></script> -->