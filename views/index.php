<?php
ob_start();
$base_url = '';
?>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3 mt-0">
                        <div class="pagetitle">
                            <h1>Halaman Utama</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item active"><a id="home" href="javascript:void(0)">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-6">
                            <table id="calTable" class="table">
                                <thead id="calTHead">
                                    <tr>
                                        <th style="width: 300px">Jenis Makanan</th>
                                        <th style="width: 300px">Jumlah dalam gram</th>
                                        <th class="text-center">
                                            <button id="addButton" class="btn btn-primary" onclick="addRowIndex()" type="button">
                                                <i class="bi bi-plus-lg"></i>
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="calTBody">
                                    <tr>
                                        <td>
                                            <select class="form-select" name="typeSelect1" id="typeSelect1">
                                            </select>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" id="amountInput1" name="amountInput1" min="1">
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 ps-5">
                            <h5>Rentang Usia</h5>
                            <div id="radioContainer" class="mb-3"></div>
                            <button id="calculateBtn" class="btn btn-primary mb-3" onclick="calculateIndex()" type="button">Calculate</button>
                            <input class="form-control" id="result" style="display: none;" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
/* Store the content of the buffer for later use */
$content = ob_get_contents();
$page = 'index';
/* Clean out the buffer, and destroy the output buffer */
ob_end_clean();
/* Call the master page. It will echo the content of the placeholders in the designated locations */
include __DIR__ . "/layout.php";
?>