<div class="content-wrapper">
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                    <form action="<?php echo base_url('edit/process_upload') ?>" method="post" enctype="multipart/form-data">
                        <h3>Masukan Foto</h3>
                        <input class="form-control" type="file" id="file" name="file">
                        <input style="margin-top: 1em" type="submit" class="btn btn-primary">
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>