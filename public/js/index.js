document.addEventListener("DOMContentLoaded", function () {
    const lookReport = document.getElementById("report_submit");
    const monthDropdown = document.getElementById("month");
    const yearDropdown = document.getElementById("year");

    function convertMonthName(month) {
        const months = {
            January: "Jan",
            February: "Feb",
            March: "Mar",
            April: "Apr",
            May: "May",
            June: "Jun",
            July: "Jul",
            August: "Aug",
            September: "Sep",
            October: "Oct",
            November: "Nov",
            December: "Dec",
        };
        return months[month];
    }

    lookReport.addEventListener("click", function () {
        const selectedMonth = monthDropdown.value;
        const selectedYear = yearDropdown.value;
        const convertedMonth = convertMonthName(selectedMonth);

        const bonusTableRows = document.querySelectorAll(
            "#bonusTable tr:not(:first-child)"
        );
        const reportTable = document.getElementById("reportTable");

        // Clear all existing rows except for the header (2 first rows)
        reportTable
            .querySelectorAll("tr:not(:first-child):not(:nth-child(2))")
            .forEach((row) => row.remove());

        bonusTableRows.forEach(function (row) {
            const rowYear = row.querySelector("td:nth-child(2)").innerText;
            const rowMonth = row.querySelector("td:nth-child(3)").innerText;

            if (rowYear === selectedYear && rowMonth.includes(convertedMonth)) {
                const bonusName =
                    row.querySelector("td:nth-child(1)").innerText;
                const monthOnTime =
                    row.querySelector("td:nth-child(4)").innerText;
                const monthLate =
                    row.querySelector("td:nth-child(5)").innerText;
                const deduction =
                    row.querySelector("td:nth-child(7)").innerText;
                const componentBonus =
                    row.querySelector("td:nth-child(8)").innerText;
                const percentOnTime =
                    row.querySelector("td:nth-child(9)").innerText;
                const totalOnTime =
                    row.querySelector("td:nth-child(10)").innerText;
                const percentLate =
                    row.querySelector("td:nth-child(11)").innerText;
                const totalLate =
                    row.querySelector("td:nth-child(12)").innerText;
                const bonusOnTime = parseFloat(
                    row
                        .querySelector("td:nth-child(14)")
                        .innerText.replace(/,/g, "")
                );
                const bonusLate = parseFloat(
                    row
                        .querySelector("td:nth-child(16)")
                        .innerText.replace(/,/g, "")
                );

                // Calculate total from Bonus OnTime and Bonus Late
                const totalBonus = bonusOnTime + bonusLate;

                // Create a new row in the reportTable
                const newRow = reportTable.insertRow();

                // Insert data into the columns of the new row
                newRow.insertCell().innerText = bonusName; // Name
                newRow.insertCell().innerText = deduction; // Deduction (Salary Calculation)
                newRow.insertCell().innerText = monthLate; // Month Late
                newRow.insertCell().innerText = monthOnTime; // Month OnTime
                newRow.insertCell().innerText = componentBonus; // Component Bonus
                newRow.insertCell().innerText = percentOnTime; // Percentage OnTime
                newRow.insertCell().innerText = percentLate; // Percentage Late
                newRow.insertCell().innerText = totalOnTime; // Total Bonus OnTime
                newRow.insertCell().innerText = totalLate; // Total Bonus Late
                newRow.insertCell().innerText = bonusOnTime.toLocaleString(); // Bonus OnTime
                newRow.insertCell().innerText = bonusLate.toLocaleString(); // Bonus Late

                // Insert the sum into the Total column
                newRow.insertCell().innerText = totalBonus.toLocaleString(); // Total
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Function to handle Save and Calculate button clicks
    document
        .getElementById("bonus_save")
        .addEventListener("click", function () {
            let tableRows = document.querySelectorAll(
                "#bonusTable tr:not(:first-child)"
            );
            let totalNetValue = 0;

            tableRows.forEach((row) => {
                // Get the value of the Bonus Disbursement Status column (assume it's the last column)
                let bonusStatus = row.cells[row.cells.length - 1].innerText;

                if (bonusStatus.trim().toLowerCase() === "paid") {
                    // Hide the row
                    row.style.display = "none";
                    // Optionally, mark this row as hidden so it is not included in calculations
                    row.setAttribute("data-hidden", "true");
                } else {
                    // If the row is not hidden, include it in the calculation
                    let netValue = parseInt(
                        row.cells[3].innerText.replace(/,/g, "")
                    );
                    totalNetValue += netValue;
                }
            });
        });
});

document.addEventListener("DOMContentLoaded", () => {
    const mainTable = document.getElementById("bonusTable");
    const dataTable = document.getElementById("calculateTable");
    const employeeDropdown = document.getElementById("employeeName");
    const monthDropdown = document.getElementById("month");
    const yearDropdown = document.getElementById("year");
    const nameField = document.getElementById("name_bonus");
    const monthField = document.getElementById("month_bonus");
    const yearField = document.getElementById("year_bonus"); // Month field
    const monthLateField = document.getElementById("late");
    const monthOnTimeField = document.getElementById("ontime");
    const totalNetValueField = document.getElementById("total_value");
    const percentOnTimeField = document.getElementById("percent_ontime");
    const percentLateField = document.getElementById("percent_late");
    const salaryDeductionField = document.getElementById("salary_deduction");
    const componentBonusField = document.getElementById("component_bonus");
    const totalOnTimeField = document.getElementById("total_ontime");
    const totalLateField = document.getElementById("total_late");
    const percentBonusOnTimeField = document.getElementById(
        "percent_bonus_ontime"
    );
    const totalBonusOnTimeField = document.getElementById("total_bonus_ontime");
    const percentBonusLateField = document.getElementById("percent_bonus_late");
    const totalBonusLateField = document.getElementById("total_bonus_late");
    const submitButton = document.getElementById("bonus_submit");
    const saveButton = document.getElementById("bonus_save");

    const monthAbbreviations = {
        January: "Jan",
        February: "Feb",
        March: "Mar",
        April: "Apr",
        May: "May",
        June: "Jun",
        July: "Jul",
        August: "Aug",
        September: "Sep",
        October: "Oct",
        November: "Nov",
        December: "Dec",
    };

    const resetFormFields = () => {
        nameField.value = "";
        yearField.value = "";
        monthField.value = "";
        monthLateField.value = "0";
        monthOnTimeField.value = "0";
        totalNetValueField.value = "0";
        percentOnTimeField.value = "0%";
        percentLateField.value = "0%";
        componentBonusField.value = "0";
        totalOnTimeField.value = "0";
        totalLateField.value = "0";
        totalBonusOnTimeField.value = "0";
        totalBonusLateField.value = "0";
        saveButton.disabled = true; // Disable save button
    };

    const updateNetValues = () => {
        const selectedEmployee = employeeDropdown.value;
        const selectedYear = yearDropdown.value;
        const selectedMonth = monthDropdown.value;
        const dataRows = dataTable.querySelectorAll("tr:not(:first-child)");
        const monthCells = calculateTable.rows[0].cells;
        let monthsArray = [];

        nameField.value = selectedEmployee;
        yearField.value = selectedYear;

        // Filter data rows based on the selected year
        const filteredRows = Array.from(dataRows).filter((row) => {
            const yearInTable = row.cells[1].innerText;
            return yearInTable === selectedYear; // Only return rows with the selected year
        });

        // Clear all rows except the header
        mainTable
            .querySelectorAll("tr:not(:first-child)")
            .forEach((row) => row.remove());

        if (filteredRows.length === 0) {
            // If no data is found, hide the table and reset form fields to zero
            mainTable.style.display = "table";
            resetFormFields();
            return; // Stop further execution
        }

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
                            newRow.insertCell().innerText =
                                status === "ON TIME" || status === "LATE"
                                    ? "Unpaid"
                                    : ""; // Bonus Disbursement Status

                            // Add the abbreviated month name to the array
                            const abbreviatedMonth =
                                monthAbbreviations[monthName];
                            monthsArray.push(abbreviatedMonth);
                        }
                    }
                }
            });

            // Update the month field form with the months, separated by commas
            monthField.value = monthsArray.join(", ");

            // Calculate the total net value (LATE + ON TIME)
            const totalNetValue = totalLateValue + totalOnTimeValue;

            // Calculate the percentage of on-time
            OnTimePercentageResult = (totalOnTimeValue / totalNetValue) * 100;

            // Calculate the percentage of late
            LatePercentageResult = (totalLateValue / totalNetValue) * 100;

            OnTimePercentageResult = Math.round(OnTimePercentageResult);
            LatePercentageResult = Math.round(LatePercentageResult);

            // Update the monthLateField with the total value
            monthLateField.value = totalLateValue.toLocaleString(); // Convert back to string format
            monthOnTimeField.value = totalOnTimeValue.toLocaleString(); // Convert back to string format
            totalNetValueField.value = totalNetValue.toLocaleString(); // Convert back to string format
            percentOnTimeField.value = OnTimePercentageResult + "%"; // Convert to percentage and format
            percentLateField.value = LatePercentageResult + "%"; // Convert to percentage and format

            const salaryDeduction = parseFloat(
                salaryDeductionField.value.replace(/,/g, "")
            );

            const componentBonus = totalNetValue - salaryDeduction;
            componentBonusField.value = componentBonus.toLocaleString(); // Convert back to string format

            const percentBonusOnTime =
                parseFloat(
                    percentBonusOnTimeField.value
                        .replace(/%/g, "")
                        .replace(/,/g, "")
                ) / 100;

            //Take value from Percent Bonus Late
            const percentBonusLate =
                parseFloat(
                    percentBonusLateField.value
                        .replace(/%/g, "")
                        .replace(/,/g, "")
                ) / 100;

            // Get the Total OnTime based on Component Bonus and Percent OnTime
            const percentOnTime = OnTimePercentageResult / 100; // Convert percentage to decimal
            const totalOnTime = componentBonus * percentOnTime; // Calculate Total OnTime

            // Get the Total Late based on Component Bonus and Percent Late
            const percentLate = LatePercentageResult / 100; // Convert percentage to decimal
            const totalLate = componentBonus * percentLate; // Calculate Total Late

            // Get the Total Bonus OnTime based on Total OnTime and Percent Bonus OnTime
            const totalBonusOnTime = totalOnTime * percentBonusOnTime; // Calculate Total Bonus OnTime

            // Get the Total Bonus Late based on Total Late and Percent Bonus Late
            const totalBonusLate = totalLate * percentBonusLate; // Calculate Total Bonus Late

            // Display the calculated Total OnTime
            totalOnTimeField.value = totalOnTime.toLocaleString(); // Convert back to string format

            // Display the calculated Total Late
            totalLateField.value = totalLate.toLocaleString(); // Convert back to string format

            // Display the calculated Total Bonus OnTime
            totalBonusOnTimeField.value = totalBonusOnTime.toLocaleString(); // Convert back to string

            // Display the calculated Total Bonus OnTime
            totalBonusLateField.value = totalBonusLate.toLocaleString(); // Convert back to string

            // Enable the Save button after calculation
            saveButton.disabled = false;
        }
    };

    // Update when the submit button is clicked
    submitButton.addEventListener("click", updateNetValues);

    // Disable Save button on page load
    saveButton.disabled = true;
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
        "#salary, #price, #contract_value, #commission_price, #software_price, #net_value1, #netvalue2, #bonus_value, #salary_deduction"
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
