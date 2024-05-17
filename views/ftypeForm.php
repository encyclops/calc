<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_SESSION['username'])) {
?>
    <section class="section" id="ftypeMainSection">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-3 mt-0 justify-content-between">
                            <div class="pagetitle col-md-auto">
                                <h1>Data Bahan Makanan</h1>
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a id="home" href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item active">Data Bahan Makanan</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-auto">
                                <button type="button" class="btn btn-primary" onclick="addDataFtype()">Tambah</button>
                            </div>
                        </div>
                        <div style="overflow-y: auto; max-height: 500px;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col" colspan="9">Composition</th>
                                        <th scope="col" colspan="10">True</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Total Protein</th>
                                        <th scope="col">Lys</th>
                                        <th scope="col">SAA</th>
                                        <th scope="col">THR</th>
                                        <th scope="col">TRP</th>
                                        <th scope="col">LEU</th>
                                        <th scope="col">ILE</th>
                                        <th scope="col">AAA</th>
                                        <th scope="col">VAL</th>
                                        <th scope="col">HIS</th>
                                        <th scope="col">Lys</th>
                                        <th scope="col">SAA</th>
                                        <th scope="col">THR</th>
                                        <th scope="col">TRP</th>
                                        <th scope="col">LEU</th>
                                        <th scope="col">ILE</th>
                                        <th scope="col">AAA</th>
                                        <th scope="col">VAL</th>
                                        <th scope="col">HIS</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="ftypeMainTBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="ftypeFormSection" style="display: none;">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <form class="row g-3 mt-0" id="ftypeForm">
                            <div class="pagetitle">
                                <h1 id="pageTitleFtype">Tambah Data Bahan Makanan</h1>
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a id="home" href="javascript:void(0)">Home</a></li>
                                        <li class="breadcrumb-item"><a onclick="switchSection('ftypeFormSection', 'ftypeMainSection')" href="javascript:void(0)">Data Bahan Makanan</a></li>
                                        <li class="breadcrumb-item active" id="pageDescFtype">Tambah Data Bahan Makanan</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6">
                                <label for="FTYPE_NAME" class="form-label">Nama</label>
                                <input type="text" class="form-control" required id="FTYPE_NAME" name="FTYPE_NAME">
                            </div>
                            <div class="col-md-6">
                                <label for="FTYPE_PROTEIN" class="form-label">Protein</label>
                                <input type="number" class="form-control" required id="FTYPE_PROTEIN" name="FTYPE_PROTEIN">
                            </div>

                            <h5 class="card-title">Composition</h5>
                            <div class="col-md-4">
                                <label for="FTYPE_COMPLYS" class="form-label">Lys</label>
                                <input type="number" class="form-control" required id="FTYPE_COMPLYS" name="FTYPE_COMPLYS">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_COMPSAA" class="form-label">SAA</label>
                                <input type="number" class="form-control" required id="FTYPE_COMPSAA" name="FTYPE_COMPSAA">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_COMPTHR" class="form-label">THR</label>
                                <input type="number" class="form-control" required id="FTYPE_COMPTHR" name="FTYPE_COMPTHR">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_COMPTRP" class="form-label">TRP</label>
                                <input type="number" class="form-control" required id="FTYPE_COMPTRP" name="FTYPE_COMPTRP">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_COMPLEU" class="form-label">LEU</label>
                                <input type="number" class="form-control" required id="FTYPE_COMPLEU" name="FTYPE_COMPLEU">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_COMPILE" class="form-label">ILE</label>
                                <input type="number" class="form-control" required id="FTYPE_COMPILE" name="FTYPE_COMPILE">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_COMPAAA" class="form-label">AAA</label>
                                <input type="number" class="form-control" required id="FTYPE_COMPAAA" name="FTYPE_COMPAAA">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_COMPVAL" class="form-label">VAL</label>
                                <input type="number" class="form-control" required id="FTYPE_COMPVAL" name="FTYPE_COMPVAL">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_COMPHIS" class="form-label">HIS</label>
                                <input type="number" class="form-control" required id="FTYPE_COMPHIS" name="FTYPE_COMPHIS">
                            </div>

                            <h5 class="card-title">True</h5>
                            <div class="col-md-4">
                                <label for="FTYPE_TRUELYS" class="form-label">Lys</label>
                                <input type="number" class="form-control" required step="0.01" id="FTYPE_TRUELYS" name="FTYPE_TRUELYS">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_TRUESAA" class="form-label">SAA</label>
                                <input type="number" class="form-control" required id="FTYPE_TRUESAA" name="FTYPE_TRUESAA">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_TRUETHR" class="form-label">THR</label>
                                <input type="number" class="form-control" required id="FTYPE_TRUETHR" name="FTYPE_TRUETHR">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_TRUETRP" class="form-label">TRP</label>
                                <input type="number" class="form-control" required id="FTYPE_TRUETRP" name="FTYPE_TRUETRP">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_TRUELEU" class="form-label">LEU</label>
                                <input type="number" class="form-control" required id="FTYPE_TRUELEU" name="FTYPE_TRUELEU">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_TRUEILE" class="form-label">ILE</label>
                                <input type="number" class="form-control" required id="FTYPE_TRUEILE" name="FTYPE_TRUEILE">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_TRUEAAA" class="form-label">AAA</label>
                                <input type="number" class="form-control" required id="FTYPE_TRUEAAA" name="FTYPE_TRUEAAA">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_TRUEVAL" class="form-label">VAL</label>
                                <input type="number" class="form-control" required id="FTYPE_TRUEVAL" name="FTYPE_TRUEVAL">
                            </div>
                            <div class="col-md-4">
                                <label for="FTYPE_TRUEHIS" class="form-label">HIS</label>
                                <input type="number" class="form-control" required id="FTYPE_TRUEHIS" name="FTYPE_TRUEHIS">
                            </div>
                            <div class="justify-content-between d-flex">
                                <input type="hidden" class="form-control" required id="FTYPE_ID" name="FTYPE_ID">
                                <button type="button" class="btn btn-danger" onclick="switchSection('ftypeFormSection', 'ftypeMainSection')">Kembali</button>
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
$page = 'ftype';
/* Clean out the buffer, and destroy the output buffer */
ob_end_clean();
/* Call the master page. It will echo the content of the placeholders in the designated locations */
include __DIR__ . "/layout.php";
?>