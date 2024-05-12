<?php
$base_url = "http://localhost/calc/";
?>
<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kalkulator</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo $base_url ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo $base_url ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo $base_url ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo $base_url ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo $base_url ?>assets/css/style.css" rel="stylesheet">

    <!-- SweetAlert2 CSS File -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: May 30 2023 with Bootstrap v5.3.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link nav-icon search-bar-toggle " href="<?php echo $base_url ?>views/ftypeForm.php">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main id="main" class="main">
        <?php echo $content ?>
    </main>

    <script>
        const base_url = '<?php echo $base_url ?>';
        if (document.getElementById("home")) document.getElementById("home").href = base_url;

        function switchSection(hide, show) {
            console.log(hide, show);
            document.getElementById(hide).style.display = 'none';
            document.getElementById(show).style.display = 'block';
        }

        const ftypeAttributes = [
            'FTYPE_NAME',
            'FTYPE_PROTEIN',
            'FTYPE_COMPLYS',
            'FTYPE_COMPSAA',
            'FTYPE_COMPTHR',
            'FTYPE_COMPTRP',
            'FTYPE_COMPLEU',
            'FTYPE_COMPILE',
            'FTYPE_COMPAAA',
            'FTYPE_COMPVAL',
            'FTYPE_COMPHIS',
            'FTYPE_TRUELYS',
            'FTYPE_TRUESAA',
            'FTYPE_TRUETHR',
            'FTYPE_TRUETRP',
            'FTYPE_TRUELEU',
            'FTYPE_TRUEILE',
            'FTYPE_TRUEAAA',
            'FTYPE_TRUEVAL',
            'FTYPE_TRUEHIS',
        ];
    </script>

    <!-- Data Fetching -->
    <script>
        async function fetchData(code) {
            try {
                const requestBody = new FormData();
                requestBody.append('action', code);

                const response = await fetch('<?php echo $base_url ?>database/populate_options.php', {
                    method: 'POST',
                    body: requestBody
                });

                if (response.ok) {
                    const data = await response.text();
                    const dataArray = JSON.parse(data);
                    return dataArray;
                } else {
                    console.error('Error:', response.statusText);
                }
            } catch (error) {
                console.error('Error fetching options:', error);
            }
        }

        async function getOneFoodType(id) {
            try {
                const dataArray = await fetchData('allFoodType');
                var foundObject = dataArray.find(function(item) {
                    return item.FTYPE_ID === id;
                });
                return foundObject;
            } catch (error) {
                console.error('Error fetching options:', error);
            }
        }

        async function getOneRefPattern(id) {
            try {
                const dataArray = await fetchData('allRefPattern');
                var foundObject = dataArray.find(function(item) {
                    return item.RPATT_ID === id;
                });
                return foundObject;
            } catch (error) {
                console.error('Error fetching options:', error);
            }
        }
    </script>

    <!-- Index Page -->
    <script>
        <?php if ($page == 'index') { ?>
            populateRadioIndex();
            populateOptionsIndex(1);
        <?php } ?>

        let rowCounter = 1;

        function addRowIndex() {
            rowCounter++;

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
        <td>
            <select class="form-select" name="typeSelect${rowCounter}" id="typeSelect${rowCounter}"></select>
        </td>
        <td>
            <input class="form-control" type="number" id="amountInput${rowCounter}" name="amountInput${rowCounter}" min="1">
        </td>
        <td class="text-center">
            <button class="btn btn-danger" onclick="deleteRowIndex(this)" type="button"><i class="bi bi-dash-lg"></i></button>
        </td>
    `;

            document.getElementById('calTBody').appendChild(newRow);
            populateOptionsIndex(rowCounter);
        }

        function deleteRowIndex(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        async function calculateIndex() {
            const radioButtons = document.querySelectorAll('input[type="radio"][name="rPattern"]');
            let checked = false;
            radioButtons.forEach(radioButton => {
                if (radioButton.checked) {
                    checked = true;
                }
            });

            if (checked) {
                const inputElements = document.querySelectorAll('[id^="amountInput"]');
                let empty = false;

                inputElements.forEach(inputElement => {
                    if (inputElement.value == '') {
                        empty = true;
                    }
                });

                if (!empty) {
                    const selectElements = document.querySelectorAll('[id^="typeSelect"]');
                    const promises = [];

                    selectElements.forEach(select => {
                        promises.push(getOneFoodType(select.value));
                    });

                    try {
                        const results = await Promise.all(promises);
                        let i = 1;
                        let totalPro = 0;
                        let totalLys = 0;
                        let totalSAA = 0;
                        let totalThr = 0;
                        let totalTrp = 0;

                        results.forEach(data => {
                            while (!document.getElementById('amountInput' + i)) i++;
                            const input = parseFloat(document.getElementById('amountInput' + i).value) / 100;

                            const pro = input * data['FTYPE_PROTEIN'];
                            totalPro += pro;

                            const lys = pro * data['FTYPE_COMPLYS'] * data['FTYPE_TRUELYS'];
                            totalLys += lys;

                            const saa = pro * data['FTYPE_COMPSAA'] * data['FTYPE_TRUESAA'];
                            totalSAA += saa;

                            const thr = pro * data['FTYPE_COMPTHR'] * data['FTYPE_TRUETHR'];
                            totalThr += thr;

                            const trp = pro * data['FTYPE_COMPTRP'] * data['FTYPE_TRUETRP'];
                            totalTrp += trp;
                            i++;
                        });

                        const aaLys = totalLys / totalPro;
                        const aaSAA = totalSAA / totalPro;
                        const aaThr = totalThr / totalPro;
                        const aaTrp = totalTrp / totalPro;

                        const refPatternRBtn = document.querySelector('input[type="radio"][name="rPattern"]:checked');
                        if (refPatternRBtn) {
                            const data = await getOneRefPattern(refPatternRBtn.value);

                            const rRatioLys = aaLys / data['RPATT_LYS'];
                            const rRatioSAA = aaSAA / data['RPATT_SAA'];
                            const rRatioThr = aaThr / data['RPATT_THR'];
                            const rRatioTrp = aaTrp / data['RPATT_TRP'];

                            var lowestRatio = Math.round(Math.min(rRatioLys, rRatioSAA, rRatioThr, rRatioTrp) * 100);

                            if (lowestRatio < 75) lowestRatio += " (buruk)";
                            else if (lowestRatio < 100) lowestRatio += " (baik)";
                            else lowestRatio += " (sangat baik)";

                            document.getElementById('result').value = lowestRatio;
                            document.getElementById('result').style.display = 'block';
                        }
                    } catch (error) {
                        console.error('Error fetching options:', error);
                    }
                } else {
                    console.log('Please fill all empty input.');
                }
            } else {
                console.log('Please select an option before calculating.');
            }
        }

        async function populateOptionsIndex(rowNumber) {
            const dataArray = await fetchData('allFoodType');
            const select = document.getElementById(`typeSelect${rowNumber}`);
            dataArray.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.FTYPE_ID;
                option.textContent = item.FTYPE_NAME;
                select.appendChild(option);
            });
        }

        async function populateRadioIndex() {
            const dataArray = await fetchData('allRefPattern');
            var radioContainer = document.getElementById('radioContainer');

            dataArray.forEach(function(item) {
                var div = document.createElement('div');
                div.className = 'form-check';

                var input = document.createElement('input');
                input.className = 'form-check-input';
                input.type = 'radio';
                input.name = 'rPattern';
                input.id = 'rPattern' + item.RPATT_ID;
                input.value = item.RPATT_ID;

                var label = document.createElement('label');
                label.className = 'form-check-label';
                label.setAttribute('for', 'rPattern' + item.RPATT_ID);
                label.textContent = item.RPATT_NAME;

                div.appendChild(input);
                div.appendChild(label);

                radioContainer.appendChild(div);
            });
        }
    </script>

    <!-- Food Type CRUD -->
    <script>
        <?php if ($page == 'ftype') { ?>
            populateFtypeTable();
        <?php } ?>

        async function populateFtypeTable() {
            const dataArray = await fetchData('allFoodType');
            var tbody = document.getElementById('ftypeMainTBody');
            var counter = 1;
            dataArray.forEach(function(rowData) {
                var row = document.createElement('tr');
                row.style.cursor = 'pointer';

                Object.entries(rowData).forEach(function([key, value]) {
                    var cell = document.createElement('td');
                    if (key == 'FTYPE_ID') {
                        cell.textContent = counter;
                        row.addEventListener('click', function() {
                            updateDataFtype(value);
                        });
                    } else if (key != 'FTYPE_STATUS') cell.textContent = value;
                    row.appendChild(cell);
                });

                counter++;
                tbody.appendChild(row);
            });
        }

        function addDataFtype() {
            const form = document.getElementById('ftypeForm');
            form.reset();
            document.getElementById('pageTitleFtype').textContent = document.getElementById('pageDescFtype').textContent = 'Tambah Data Bahan Makanan';
            switchSection('ftypeMainSection', 'ftypeFormSection');
        }

        async function updateDataFtype(id) {
            const data = await getOneFoodType(id);
            ftypeAttributes.forEach(attribute => {
                const value = data[attribute];
                if (value !== undefined && document.getElementById(attribute) !== null) {
                    document.getElementById(attribute).value = value;
                    console.log(attribute, value);
                }
            });
            document.getElementById('pageTitleFtype').textContent = document.getElementById('pageDescFtype').textContent = 'Ubah Data Bahan Makanan';
            document.getElementById('FTYPE_ID').value = data['FTYPE_ID'];
            switchSection('ftypeMainSection', 'ftypeFormSection');
        }

        async function validateForm() {
            const form = document.getElementById('ftypeForm');
            event.preventDefault();
            const id = document.getElementById('FTYPE_ID').value;

            if (form.checkValidity()) {
                const data = {};

                ftypeAttributes.forEach(fieldName => {
                    const element = document.getElementById(fieldName);
                    if (element) {
                        data[fieldName] = parseInt(element.value);
                        if (fieldName == 'FTYPE_NAME') data[fieldName] = element.value;
                    }
                });

                data['FTYPE_STATUS'] = 1;

                try {
                    const requestBody = new FormData();
                    requestBody.append('data', JSON.stringify(data));
                    if (id != '') {
                        requestBody.append('action', 'updateFtype');
                        requestBody.append('id', id);
                    } else {
                        requestBody.append('action', 'insertFtype');
                    }

                    const response = await fetch(base_url + 'database/populate_options.php', {
                        method: 'POST',
                        body: requestBody
                    });

                    if (response.ok) {
                        const data = await response.text();
                        Swal.fire({
                            icon: 'success',
                            title: 'Data Updated',
                            text: data,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        console.error('Error:', response.statusText);
                    }
                } catch (error) {
                    console.error('Error fetching options:', error);
                }
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Form Invalid',
                    text: 'Please fill all the blank space!',
                    confirmButtonText: 'OK'
                });
            }
        }
    </script>

    <!-- Vendor JS Files -->
    <script src="<?php echo $base_url ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?php echo $base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $base_url ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?php echo $base_url ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?php echo $base_url ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?php echo $base_url ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?php echo $base_url ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?php echo $base_url ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo $base_url ?>assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>