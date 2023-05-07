<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">View User</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> <span class='fw-300'>View User</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div id="panel-1" class="panel">
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="frame-wrap">
                            <table class="table m-0">
                                <tr>
                                    <th scope="row">First Name</th>
                                    <td><?php echo $data['user']['first_name'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Last Name</th>
                                    <td><?php echo $data['user']['last_name'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><?php echo $data['user']['email'] ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Username</th>
                                    <td><?php echo $data['user']['username'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <a href="<?php echo base_url('/users'); ?>" class="btn btn-primary waves-effect waves-themed">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
