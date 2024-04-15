<html>

<head>
    <h1>Kalkulator</h1>
</head>

<body>
    <table id="calTable" style="border: 1px solid;">
        <thead id="calTHead">
            <tr>
                <th>Jenis Makanan</th>
                <th>Jumlah dalam gram</th>
                <th>
                    <button id="addButton" onclick="addRow()" type="button">+</button>
                </th>
            </tr>
        </thead>
        <tbody id="calTBody">
            <tr>
                <td>
                    <select name="typeSelect1" id="typeSelect1">
                    </select>
                </td>
                <td>
                    <input type="number" id="amountInput1" name="amountInput1" min="1">
                </td>
            </tr>
        </tbody>
    </table>
    <div id="radioContainer">
    </div>
    <button id="calculateBtn" onclick="calculate()" type="button">Calculate</button>
</body>
<script>
    let rowCounter = 1;

    function addRow() {
        rowCounter++;

        const newRow = document.createElement('tr');
        newRow.innerHTML = `
        <td>
            <select name="typeSelect${rowCounter}" id="typeSelect${rowCounter}"></select>
        </td>
        <td>
            <input type="number" id="amountInput${rowCounter}" name="amountInput${rowCounter}" min="1">
        </td>
        <td>
            <button onclick="deleteRow(this)" type="button">-</button>
        </td>
    `;

        document.getElementById('calTBody').appendChild(newRow);
        populateOptions(rowCounter);
    }

    function deleteRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }

    async function calculate() {
        const radioButtons = document.querySelectorAll('input[type="radio"][name="rPattern"]');
        let checked = false;

        // Check if any radio button is checked
        radioButtons.forEach(radioButton => {
            if (radioButton.checked) {
                checked = true;
            }
        });

        // If at least one radio button is checked, call the calculate function
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
                    // Push the promise returned by checkValue to the promises array
                    promises.push(checkValue(select.value));
                });

                try {
                    // Wait for all promises to resolve
                    const results = await Promise.all(promises);

                    results.forEach(data => {
                        // Push the promise returned by checkValue to the promises array
                        console.log(data);
                    });
                    // Handle the results as needed
                } catch (error) {
                    // Handle any errors that may occur during the promise resolution
                    console.error('Error fetching options:', error);
                }
            } else {
                console.log('Please fill all empty input.');
            }
        } else {
            console.log('Please select an option before calculating.');
        }
    }

    async function populateOptions(rowNumber) {
        try {
            // Prepare the request body with the action parameter
            const requestBody = new FormData();
            requestBody.append('action', 'allFoodType');

            // Make a fetch request to populate_options.php with POST method and request body
            const response = await fetch('populate_options.php', {
                method: 'POST',
                body: requestBody
            });

            // Check if the response is successful
            if (response.ok) {
                // Parse the response as text
                const data = await response.text();
                console.log(data);
                const select = document.getElementById(`typeSelect${rowNumber}`);
                select.innerHTML = data;
                // Handle the response data as needed
            } else {
                // Handle error if the response is not ok
                console.error('Error:', response.statusText);
            }
        } catch (error) {
            // Handle any other errors that may occur during the fetch operation
            console.error('Error fetching options:', error);
        }
    }

    async function checkValue(rowNumber) {
        try {
            // Prepare the request body with the action parameter
            const requestBody = new FormData();
            requestBody.append('action', 'oneFT');
            requestBody.append('FTYPE_ID', rowNumber);

            // Make a fetch request to populate_options.php with POST method and request body
            const response = await fetch('populate_options.php', {
                method: 'POST',
                body: requestBody
            });

            // Check if the response is successful
            if (response.ok) {
                // Parse the response as text
                const data = await response.text();
                const dataArray = JSON.parse(data);
                return dataArray;
                // Handle the response data as needed
            } else {
                // Handle error if the response is not ok
                console.error('Error:', response.statusText);
            }
        } catch (error) {
            // Handle any other errors that may occur during the fetch operation
            console.error('Error fetching options:', error);
        }
    }

    // Function to fetch data from the server
    async function fetchData() {
        try {
            // Prepare the request body with the action parameter
            const requestBody = new FormData();
            requestBody.append('action', 'allRefPattern');

            // Make a fetch request to populate_options.php with POST method and request body
            const response = await fetch('populate_options.php', {
                method: 'POST',
                body: requestBody
            });

            // Check if the response is successful
            if (response.ok) {
                // Parse the response as text
                const data = await response.text();
                console.log(data);
                const container = document.getElementById(`radioContainer`);
                container.innerHTML = data;
                // Handle the response data as needed
            } else {
                // Handle error if the response is not ok
                console.error('Error:', response.statusText);
            }
        } catch (error) {
            console.error('Error fetching data:', error);
            return []; // Return an empty array if an error occurs
        }
    }

    fetchData();
    populateOptions(1);
</script>

</html>