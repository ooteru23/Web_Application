document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("calculate")
        .addEventListener("click", calculateTotal);

    function calculateTotal() {
        let table = document.getElementById("bonusTable");
        let total = 0;

        for (let i = 1; i < table.rows.length; i++) {
            let cells = table.rows[i].cells;

            if (cells.length > 0) {
                let value = cells[1].innerText;

                if (value !== "-" && !isNaN(parseFloat(value))) {
                    total += parseFloat(value);
                }
            }
        }

        document.getElementById("total_value").value = total.toFixed(3);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const employeeData = getEmployeeData();
    const statusData = getStatusData();

    const employeeSelect = document.getElementById("employee_name");
    const monthSelect = document.getElementById("month");

    employeeSelect.addEventListener("change", updateFields);
    monthSelect.addEventListener("change", updateFields);

    function updateFields() {
        const employeeName = employeeSelect.value;
        const selectedMonth = monthSelect.value;

        if (employeeName) {
            const clientName = employeeData.clientMapping[employeeName] || "";
            const netValue = employeeData.netValueMapping[employeeName] || "";
            document.getElementById("client_name").value = clientName;
            document.getElementById("net_value").value = netValue;
        } else {
            document.getElementById("client_name").value = "";
            document.getElementById("net_value").value = "";
        }

        if (employeeName && selectedMonth) {
            const status = statusData[employeeName][selectedMonth] || "";
            document.getElementById("status_work").value = status;
            checkStatusAndUpdateNetValue(status);
        } else {
            document.getElementById("status_work").value = "";
            checkStatusAndUpdateNetValue("");
        }
    }

    function checkStatusAndUpdateNetValue(status) {
        const netValueInput = document.getElementById("net_value");
        if (status.toLowerCase() === "nothing") {
            netValueInput.value = "-";
        }
    }

    function getEmployeeData() {
        const table = document.getElementById("calculateTable");
        const rows = table.rows;
        const clientMapping = {};
        const netValueMapping = {};

        for (let i = 1; i < rows.length; i++) {
            const clientName = rows[i].cells[0].innerText;
            const employee1 = rows[i].cells[2].innerText;
            const employee2 = rows[i].cells[3].innerText;
            const netValue1 = rows[i].cells[4].innerText;
            const netValue2 = rows[i].cells[5].innerText;

            clientMapping[employee1] = clientName;
            netValueMapping[employee1] = netValue1;

            clientMapping[employee2] = clientName;
            netValueMapping[employee2] = netValue2;
        }
        return { clientMapping, netValueMapping };
    }

    function getStatusData() {
        const table = document.getElementById("calculateTable");
        const rows = table.rows;
        const headers = rows[0].cells;
        const mapping = {};

        for (let i = 1; i < rows.length; i++) {
            const employee1 = rows[i].cells[2].innerText;
            const employee2 = rows[i].cells[3].innerText;

            if (!mapping[employee1]) {
                mapping[employee1] = {};
            }
            if (!mapping[employee2]) {
                mapping[employee2] = {};
            }

            for (let j = 0; j < headers.length; j++) {
                const month = headers[j].innerText;
                const status = rows[i].cells[j].innerText;
                mapping[employee1][month] = status;
                mapping[employee2][month] = status;
            }
        }
        return mapping;
    }
});

function getEmployeeData() {
    const table = document.getElementById("calculateTable");
    const rows = table.rows;
    const clientMapping = {};
    const netValueMapping = {};

    for (let i = 1; i < rows.length; i++) {
        const clientName = rows[i].cells[0].innerText;
        const employee1 = rows[i].cells[2].innerText;
        const employee2 = rows[i].cells[3].innerText;
        const netValue1 = rows[i].cells[4].innerText;
        const netValue2 = rows[i].cells[5].innerText;

        clientMapping[employee1] = clientName;
        netValueMapping[employee1] = netValue1;

        clientMapping[employee2] = clientName;
        netValueMapping[employee2] = netValue2;
    }
    return { clientMapping, netValueMapping };
}

function getStatusData() {
    const table = document.getElementById("calculateTable");
    const rows = table.rows;
    const headers = rows[0].cells;
    const mapping = {};

    for (let i = 1; i < rows.length; i++) {
        const employee1 = rows[i].cells[2].innerText;
        const employee2 = rows[i].cells[3].innerText;

        if (!mapping[employee1]) {
            mapping[employee1] = {};
        }
        if (!mapping[employee2]) {
            mapping[employee2] = {};
        }

        for (let j = 0; j < headers.length; j++) {
            const month = headers[j].innerText;
            const status = rows[i].cells[j].innerText;
            mapping[employee1][month] = status;
            mapping[employee2][month] = status;
        }
    }
    return mapping;
}
// Function to save the state
function saveState() {
    const employeeName = document.getElementById("employee_name").value;
    localStorage.setItem("employee_name", employeeName);
}
// Function to load the state
function loadState() {
    const employeeName = localStorage.getItem("employee_name");
    if (employeeName && document.getElementById("employee_name")) {
        document.getElementById("employee_name").value = employeeName;
    }
}

// Ensure the DOM is fully loaded before running the script
document.addEventListener("DOMContentLoaded", () => {
    loadState();

    // Add event listener to save state on form submission
    document
        .getElementById("control_form")
        .addEventListener("submit", function () {
            saveState();
        });
});

// Set the Cursor position
document.querySelectorAll("input[type=text]").forEach((input) => {
    let lastValue = "";
    input.addEventListener("input", (e) => {
        let cursorPosition = e.target.selectionStart;
        let value = e.target.value.replace(/\./g, "");
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        e.target.value = value;
        if (value.length > lastValue.length) {
            cursorPosition = value.length;
        }
        e.target.setSelectionRange(cursorPosition, cursorPosition);
        lastValue = value;
    });
});

// Get all the rows in the table
var rows = document.getElementsByTagName("tr");
for (var i = 0; i < rows.length; i++) {
    // Get the 'Offer Status' and 'Actions' cells
    var statusCell = rows[i].cells[11];
    var actionsCell = rows[i].cells[12];

    if (statusCell && actionsCell) {
        // Check if the 'Offer Status' is 'Accepted'
        if (statusCell.innerText === "Accepted") {
            // Get the 'Delete' and 'Edit' buttons
            var buttons = actionsCell.getElementsByTagName("a");
            for (var j = 0; j < buttons.length; j++) {
                // Hide the 'Delete' and 'Edit' buttons
                if (buttons[j].innerText === "Edit") {
                    buttons[j].style.display = "none";
                }
            }
        }
    }
}

document.addEventListener("click", function () {
    // Get the values from the form
    const contractValue = parseFloat(
        document.getElementById("contract_value").value.replace(/\./g, "")
    );
    const commissionPrice = parseFloat(
        document.getElementById("commission_price").value.replace(/\./g, "")
    );
    const softwarePrice = parseFloat(
        document.getElementById("software_price").value.replace(/\./g, "")
    );
    const percent1 = parseFloat(
        document.getElementById("percent1").value.replace(/\./g, "")
    );
    const percent2 = parseFloat(
        document.getElementById("percent2").value.replace(/\./g, "")
    );

    // Calculate Net Value 1 dan 2
    const netValue1 =
        ((contractValue - commissionPrice - softwarePrice) / 100) * percent1;
    const netValue2 =
        ((contractValue - commissionPrice - softwarePrice) / 100) * percent2;

    // Input the result into the form
    document.getElementById("net_value1").value = isNaN(netValue1)
        ? 0
        : netValue1.toLocaleString("id-ID");
    document.getElementById("net_value2").value = isNaN(netValue2)
        ? 0
        : netValue2.toLocaleString("id-ID");
});

document.addEventListener("DOMContentLoaded", function () {
    var table = document.getElementById("controlTable");
    var button = document.getElementById("checkdata");

    // Check session storage to see if the table should be displayed
    if (sessionStorage.getItem("tableDisplayed") === "true") {
        table.style.display = "inline-block";
    }

    button.addEventListener("click", function () {
        table.style.display = "inline-block";

        // Save the table state in session storage
        sessionStorage.setItem("tableDisplayed", "true");
    });

    // Clear the local storage when the page is reloaded
    document.addEventListener("beforeunload", function () {
        SessionStorage.removeItem("tableDisplayed");
    });
});

document.getElementById("employee1").addEventListener("change", function () {
    var employee2 = document.getElementById("employee2");
    for (var i = 0; i < employee2.options.length; i++) {
        if (employee2.options[i].value === this.value) {
            employee2.options[i].remove();
            break;
        }
    }
});
document.getElementById("employee2").addEventListener("change", function () {
    var employee1 = document.getElementById("employee1");
    for (var i = 0; i < employee1.options.length; i++) {
        if (employee1.options[i].value === this.value) {
            employee1.options[i].remove();
            break;
        }
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const clientNameSelect = document.getElementById("client_candidate");
    const contractValueInput = document.getElementById("contract_value");
    const clientTable = document.getElementById("clientTable");

    clientNameSelect.addEventListener("change", function () {
        const selectedClient = this.value;
        if (selectedClient) {
            const rows = clientTable.querySelectorAll("tr");
            rows.forEach((row) => {
                const clientNameCell = row.cells[0];
                if (clientNameCell.textContent === selectedClient) {
                    const contractValue = row.cells[5].textContent;
                    contractValueInput.value = contractValue;
                }
            });
        } else {
            contractValueInput.value = "";
        }
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Get the dropdown and the table
    const dropdown = document.getElementById("client_candidate");
    const table = document.getElementById("calculateTable");

    // Get all client names from the table
    var clientNames = Array.from(
        table.querySelectorAll("tr td:first-child")
    ).map((td) => td.textContent.trim());

    // Get all options from the dropdown
    var options = Array.from(dropdown.options);

    // Remove options that are in the clientNames array
    options.forEach((option) => {
        if (clientNames.includes(option.textContent.trim())) {
            option.remove();
        }
    });
});
