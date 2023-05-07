<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item active">Users</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> <span class='fw-300'>Users</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    User <span class="fw-300"><i>Listing</i></span>
                </h2>
                <div class="panel-toolbar">
                    <a href="<?php echo base_url('users/create');?>" title="Add User" class="btn btn-primary btn-sm">Add User</a>
                </div>
                <!-- <button class="btn btn-primary btn-sm" data-toggle="dropdown">Add User</button> -->
            </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="userListResults" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function() {
        oTable = $('#userListResults').dataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                dataType: 'json',
                url: SITE_URL + 'users/lists',
                method: "POST",
            },
            columns: [
                {name : "id", sortable: false, searchable:false},
                {name : "first_name", sortable: true},
                {name : "last_name", sortable: true},
                {name : "email", sortable: true},
                {name : "mobile", sortable: true},
                {name : "username", sortable: true},
                {name : "is_active", sortable: false, searchable:false},
                {name : "action", sortable: false, searchable:false},
            ],
        });
    });
</script>
