<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_SESSION['username'])) {
?>
    <section class="section" id="userMainSection">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3 mt-0 justify-content-between">
                            <div class="pagetitle col-md-auto">
                                <h1>Data Admin</h1>
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a id="home" href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active">Data Admin</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-auto">
                                <button type="button" class="btn btn-primary" onclick="addDataUser()">Tambah</button>
                            </div>
                        </div>
                        <div style="overflow-y: auto; max-height: 500px;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="userMainTBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="userFormSection" style="display: none;">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 mt-0" id="userForm">
                            <div class="pagetitle">
                                <h1 id="pageTitleUser">Tambah Data Admin</h1>
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a id="home" href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item"><a onclick="switchSection('userFormSection', 'userMainSection')" href="javascript:void(0)">Data Admin</a></li>
                                        <li class="breadcrumb-item active" id="pageDescUser">Tambah Data Admin</li>
                                    </ol>
                                </nav>
                            </div>
                            <h5 class="card-title">General</h5>
                            <div class="col-md-4">
                                <label for="USER_NAME" class="form-label">Name</label>
                                <input type="text" class="form-control" required id="USER_NAME" name="USER_NAME">
                            </div>
                            <div class="col-md-4">
                                <label for="USER_USERNAME" class="form-label">Username</label>
                                <input type="text" class="form-control" required id="USER_USERNAME" name="USER_USERNAME">
                            </div>
                            <div class="col-md-4">
                                <label for="USER_PASSWORD" class="form-label">Password</label>
                                <input type="password" class="form-control" required id="USER_PASSWORD" name="USER_PASSWORD">
                            </div>
                            <div class="justify-content-between d-flex">
                                <input type="hidden" class="form-control" required id="USER_ID" name="USER_ID">
                                <button type="button" class="btn btn-danger" onclick="switchSection('userFormSection', 'userMainSection')">Kembali</button>
                                <button type="submit" class="btn btn-primary" onclick="validateForm()">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
} else {
    header("Location: " . $_SESSION['path']);
}
/* Store the content of the buffer for later use */
$content = ob_get_contents();
$page = 'user';
/* Clean out the buffer, and destroy the output buffer */
ob_end_clean();
/* Call the master page. It will echo the content of the placeholders in the designated locations */
include __DIR__ . "/layout.php";
?>