// function calculateTotal() {
//     let table = document.getElementById("bonusTable");
//     let total = 0;

//     if (table) {
//         for (let i = 1; i < table.rows.length; i++) {
//             let cells = table.rows[i].cells;
//             if (cells.length > 0) {
//                 let value = cells[1].innerText;
//                 if (value !== "-" && !isNaN(convertToNumber(value))) {
//                     total += convertToNumber(value);
//                 }
//             }
//         }
//         document.getElementById("total_bonus").value = formatNumber(total);
//     }
// }

// // Function to convert string to number
// function convertToNumber(value) {
//     let number = value.replace(/,/g, "").replace(/\./g, "");
//     return parseFloat(number);
// }

// // Function to format number with commas
// function formatNumber(value) {
//     return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
// }

document.addEventListener("DOMContentLoaded", () => {
    const mainTable = document.getElementById("bonusTable");
    const dataTable = document.getElementById("calculateTable");
    const employeeDropdown = document.getElementById("employeeName");
    const monthDropdown = document.getElementById("month");
    const monthLateField = document.getElementById("late");
    const monthOnTimeField = document.getElementById("ontime");
    const submitButton = document.getElementById("bonus_submit");

    const updateNetValues = () => {
        const selectedEmployee = employeeDropdown.value;
        const selectedMonth = monthDropdown.value;
        const dataRows = dataTable.querySelectorAll("tr:not(:first-child)");
        const monthCells = calculateTable.rows[0].cells;

        // Clear all rows except the header
        mainTable
            .querySelectorAll("tr:not(:first-child)")
            .forEach((row) => row.remove());

        // Get the index of the selected month
        const selectedMonthIndex = Array.from(monthCells).findIndex(
            (cell) => cell.innerText === selectedMonth
        );

        if (selectedMonthIndex !== -1) {
            let totalLateValue = 0;
            let totalOnTimeValue = 0;

            // Populate mainTable based on selectedEmployee and selectedMonth
            dataRows.forEach((row) => {
                const clientName = row.cells[0].innerText;
                const employee1 = row.cells[2].innerText;
                const netValue1 = row.cells[3].innerText;
                const employee2 = row.cells[4].innerText;
                const netValue2 = row.cells[5].innerText;

                let netValue = "";
                let client = "";

                if (employee1 === selectedEmployee) {
                    netValue = netValue1;
                    client = clientName;
                } else if (employee2 === selectedEmployee) {
                    netValue = netValue2;
                    client = clientName;
                }

                if (netValue && client) {
                    // Loop through all months up to and including the selected month
                    for (let i = 0; i <= selectedMonthIndex; i++) {
                        const monthName = monthCells[i + 6].innerText;
                        const status = row.cells[i + 6].innerText; // Assuming status columns start at index 6

                        if (status === "LATE") {
                            totalLateValue += parseFloat(
                                netValue.replace(/,/g, "")
                            ); // Convert to number and sum
                        } else if (status === "ON TIME") {
                            totalOnTimeValue += parseFloat(
                                netValue.replace(/,/g, "")
                            ); // Convert to number and sum
                        }

                        if (status !== "ON PROCESS") {
                            // Create a new row and cells
                            const newRow = mainTable.insertRow();
                            newRow.insertCell().innerText = client; // Client Name
                            newRow.insertCell().innerText = monthName; // Month
                            newRow.insertCell().innerText = status; // Status
                            newRow.insertCell().innerText = netValue; // Net Value
                        }
                    }
                }
            });

            // Update the monthLateField with the total value
            monthLateField.value = totalLateValue.toLocaleString(); // Convert back to string format
            monthOnTimeField.value = totalOnTimeValue.toLocaleString(); // Convert back to string format
        }
    };

    // Update when the submit button is clicked
    submitButton.addEventListener("click", updateNetValues);
});

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
    const controlForm = document.getElementById("control_form");
    if (controlForm) {
        controlForm.addEventListener("submit", function () {
            saveState();
        });
    }
});

// Set the Cursor position
document
    .querySelectorAll(
        "#salary, #price, #contract_value, #commission_price, #software_price, #net_value1, #netvalue2, #bonus_value"
    )
    .forEach((input) => {
        // Add your IDs here
        let lastValue = "";
        input.addEventListener("input", (e) => {
            let cursorPosition = e.target.selectionStart;
            let value = e.target.value.replace(/,/g, ""); // Remove existing commas
            value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ","); // Add commas for thousands
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
    const contractValueElement = document.getElementById("contract_value");
    const commissionPriceElement = document.getElementById("commission_price");
    const softwarePriceElement = document.getElementById("software_price");
    const percent1Element = document.getElementById("percent1");
    const percent2Element = document.getElementById("percent2");
    const netValue1Element = document.getElementById("net_value1");
    const netValue2Element = document.getElementById("net_value2");

    if (
        !contractValueElement ||
        !commissionPriceElement ||
        !softwarePriceElement ||
        !percent1Element ||
        !percent2Element ||
        !netValue1Element ||
        !netValue2Element
    ) {
        return;
    }

    const contractValue = parseFloat(
        contractValueElement.value.replace(/,/g, "")
    );
    const commissionPrice = parseFloat(
        commissionPriceElement.value.replace(/,/g, "")
    );
    const softwarePrice = parseFloat(
        softwarePriceElement.value.replace(/,/g, "")
    );
    const percent1 = parseFloat(percent1Element.value.replace(/,/g, ""));
    const percent2 = parseFloat(percent2Element.value.replace(/,/g, ""));

    // Calculate Net Value 1 and 2
    const netValue1 =
        ((contractValue - commissionPrice - softwarePrice) / 100) * percent1;
    const netValue2 =
        ((contractValue - commissionPrice - softwarePrice) / 100) * percent2;

    // Format the result with commas as thousands separators and no decimal places
    function formatNumberWithComma(number) {
        return Math.round(number).toLocaleString("id-ID").replace(/\./g, ",");
    }

    // Input the result into the form
    netValue1Element.value = isNaN(netValue1)
        ? 0
        : formatNumberWithComma(netValue1);
    netValue2Element.value = isNaN(netValue2)
        ? 0
        : formatNumberWithComma(netValue2);
});

document.addEventListener("DOMContentLoaded", function () {
    var table = document.getElementById("controlTable");
    var button = document.getElementById("checkdata");

    // Check if table and button are found
    if (table && button) {
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
            sessionStorage.removeItem("tableDisplayed");
        });
    }
});
document.addEventListener("DOMContentLoaded", function () {
    var employee1 = document.getElementById("employee1");
    var employee2 = document.getElementById("employee2");

    if (employee1) {
        employee1.addEventListener("change", function () {
            for (var i = 0; i < employee2.options.length; i++) {
                if (employee2.options[i].value === this.value) {
                    employee2.options[i].remove();
                    break;
                }
            }
        });
    }

    if (employee2) {
        employee2.addEventListener("change", function () {
            var employee1 = document.getElementById("employee1");
            for (var i = 0; i < employee1.options.length; i++) {
                if (employee1.options[i].value === this.value) {
                    employee1.options[i].remove();
                    break;
                }
            }
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const clientNameSelect = document.getElementById("client_candidate");
    const contractValueInput = document.getElementById("contract_value");
    const clientTable = document.getElementById("clientTable");

    if (clientNameSelect && contractValueInput && clientTable) {
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
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Get the dropdown and the table
    const dropdown = document.getElementById("client_candidate");
    const table = document.getElementById("calculateTable");

    if (dropdown && table) {
        // Get all client names from the table
        var clientNames = Array.from(
            table.querySelectorAll("tr td:first-child")
        ).map((td) => td.textContent.trim());

        // Get all options from the dropdown
        var options = Array.from(dropdown.options);

        // Remove options that are in the client names
        options.forEach((option) => {
            if (clientNames.includes(option.textContent.trim())) {
                option.remove();
            }
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const currentYear = new Date().getFullYear();
    const yearElement = document.getElementById("calculate_year");
    if (yearElement) {
        yearElement.value = currentYear;
    }
});
