document.addEventListener('DOMContentLoaded', function() {
            // Load state from localStorage
            loadState();

            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', function() {
                    saveState(this);
                });
            });

            document.getElementById('submit').addEventListener('click', checkData);
        });

        function saveState(element) {
            const month = element.getAttribute('data-month');
            const status = element.classList.contains('on-time') ? 'on-time' : 'late';

            // Save to localStorage
            localStorage.setItem(month, status);

            // Update UI
            updateUI();
        }

        function loadState() {
            document.querySelectorAll('.btn').forEach(button => {
                const month = button.getAttribute('data-month');
                const savedStatus = localStorage.getItem(month);

                if (savedStatus) {
                    if (button.classList.contains(savedStatus)) {
                        button.classList.add('selected');
                    } else {
                        button.classList.remove('selected');
                    }
                }
            });
        }

        function updateUI() {
            document.querySelectorAll('.on-time, .late').forEach(button => {
                const month = button.getAttribute('data-month');
                const savedStatus = localStorage.getItem(month);

                if (button.classList.contains(savedStatus)) {
                    button.classList.add('selected');
                } else {
                    button.classList.remove('selected');
                }
            });
        }

document.addEventListener('DOMContentLoaded', function () {
    // List of months
    const months = [
        'jan', 'feb', 'mar', 'apr', 'may', 'jun', 
        'jul', 'aug', 'sep', 'oct', 'nov', 'dec'
    ];// Extend this list as needed
    // Add event listeners for buttons
    months.forEach(month => {
        const onTimeButton = document.getElementById(`${month}-on-time`);
        const lateButton = document.getElementById(`${month}-late`);
        onTimeButton.addEventListener('click', function () {
            selectButton(month, 'on-time');
        });

        lateButton.addEventListener('click', function () {
            selectButton(month, 'late');
        });
    });

    // Add event listener for the "Check Data" button
    const checkDataButton = document.getElementById('submit');
    checkDataButton.addEventListener('click', function () {
        loadSelections();
    });

    loadSelections(); // Load selections on page load
});

function selectButton(month, status) {
    const onTimeButton = document.getElementById(`${month}-on-time`);
    const lateButton = document.getElementById(`${month}-late`);
    if (status === 'on-time') {
        onTimeButton.classList.add('selected');
        lateButton.classList.remove('selected');
    } else {
        lateButton.classList.add('selected');
        onTimeButton.classList.remove('selected');
    }

    const employeeName = document.getElementById('employee_name').value;
    const year = document.getElementById('year').value;
    localStorage.setItem(`${employeeName}-${year}-${month}`, status);
}

function loadSelections() {
    const employeeName = document.getElementById('employee_name').value;
    const year = document.getElementById('year').value;
    const months = [
        'jan', 'feb', 'mar', 'apr', 'may', 'jun',
        'jul', 'aug', 'sep', 'oct', 'nov', 'dec'
    ];// Extend this list as needed
    months.forEach(month => {
        const status = localStorage.getItem(`${employeeName}-${year}-${month}`);
        if (status) {
            const onTimeButton = document.getElementById(`${month}-on-time`);
            const lateButton = document.getElementById(`${month}-late`);
            if (status === 'on-time') {
                onTimeButton.classList.add('selected');
                lateButton.classList.remove('selected');
            } else {
                lateButton.classList.add('selected');
                onTimeButton.classList.remove('selected');
            }
        }
    });
}


// Function to save the state
function saveState() {
    const employeeName = document.getElementById('employee_name').value;
    const year = document.getElementById('year').value;
    localStorage.setItem('employee_name', employeeName);
    localStorage.setItem('year', year);
}
// Function to load the state
function loadState() {
    const employeeName = localStorage.getItem('employee_name');
    const year = localStorage.getItem('year');
    if (employeeName && document.getElementById('employee_name')) {
        document.getElementById('employee_name').value = employeeName;
    }

    if (year && document.getElementById('year')) {
        document.getElementById('year').value = year;
    } 
}
        
// Ensure the DOM is fully loaded before running the script
document.addEventListener('DOMContentLoaded', () => {
    loadState();

    // Add event listener to save state on form submission
    document.getElementById('control_form').addEventListener('submit', function () {
        saveState();
    });
});


// Set the Cursor position
document.querySelectorAll('input[type=text]').forEach(input => {
let lastValue = '';
    input.addEventListener('input', (e) => {
    let cursorPosition = e.target.selectionStart;
    let value = e.target.value.replace(/\./g, '');
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
var rows = document.getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
    // Get the 'Offer Status' and 'Actions' cells
    var statusCell = rows[i].cells[11];
    var actionsCell = rows[i].cells[12];

    if (statusCell && actionsCell) {
        // Check if the 'Offer Status' is 'Accepted'
        if (statusCell.innerText === 'Accepted') {
            // Get the 'Delete' and 'Edit' buttons
            var buttons = actionsCell.getElementsByTagName('a');
            for (var j = 0; j < buttons.length; j++) {
                // Hide the 'Delete' and 'Edit' buttons
                if (buttons[j].innerText === 'Edit') {
                    buttons[j].style.display = 'none';
                }
            }
        }
    }
}


document.addEventListener('click', function () {
    // Get the values from the form
const contractValue = parseFloat(document.getElementById('contract_value').value.replace(/\./g, ''));
const commissionPrice = parseFloat(document.getElementById('commission_price').value.replace(/\./g, ''));
const softwarePrice = parseFloat(document.getElementById('software_price').value.replace(/\./g, ''));
const percent1 = parseFloat(document.getElementById('percent1').value.replace(/\./g, ''));
const percent2 = parseFloat(document.getElementById('percent2').value.replace(/\./g, ''));
    
// Calculate Net Value 1 dan 2
    const netValue1 = ((contractValue - commissionPrice - softwarePrice) / 100) * percent1 ;
    const netValue2 = ((contractValue - commissionPrice - softwarePrice) / 100) * percent2 ;

// Input the result into the form
    document.getElementById('net_value1').value = isNaN(netValue1) ? 0 : netValue1.toLocaleString('id-ID');
    document.getElementById('net_value2').value = isNaN(netValue2) ? 0 : netValue2.toLocaleString('id-ID');
});


    document.addEventListener('DOMContentLoaded', function() {
    var table = document.getElementById('controlTable');
    var button = document.getElementById('submit');

    // Check session storage to see if the table should be displayed
    if (sessionStorage.getItem('tableDisplayed') === 'true') {
        table.style.display = 'inline-block';
    }

    button.addEventListener('click', function() {
        table.style.display = 'inline-block';

        // Save the table state in session storage
        sessionStorage.setItem('tableDisplayed', 'true');
    });

    // Clear the local storage when the page is reloaded
    document.addEventListener('beforeunload', function() {
        SessionStorage.removeItem('tableDisplayed');
    });
        
        
});


    document.getElementById('employee1').addEventListener('change', function() {
    var employee2 = document.getElementById('employee2');
    for (var i = 0; i < employee2.options.length; i++) {
        if (employee2.options[i].value === this.value) {
            employee2.options[i].remove();
            break;
        } 
    }
});
    document.getElementById('employee2').addEventListener('change', function() {
    var employee1 = document.getElementById('employee1');
    for (var i = 0; i < employee1.options.length; i++) {
        if (employee1.options[i].value === this.value) {
            employee1.options[i].remove();
            break;
        } 
    }
});


document.addEventListener('DOMContentLoaded', function() {
    const clientNameSelect = document.getElementById('client_candidate');
    const contractValueInput = document.getElementById('contract_value');
    const clientTable = document.getElementById('clientTable');

    clientNameSelect.addEventListener('change', function() {
        const selectedClient = this.value;
        if (selectedClient) {
            const rows = clientTable.querySelectorAll('tr');
            rows.forEach(row => {
                const clientNameCell = row.cells[0];
                if (clientNameCell.textContent === selectedClient) {
                    const contractValue = row.cells[5].textContent;
                    contractValueInput.value = contractValue;
                }
            });
        } else {
            contractValueInput.value = '';
        }
    });
});


document.addEventListener("DOMContentLoaded", function() {
    // Get the dropdown and the table
    const dropdown = document.getElementById('client_candidate'); 
    const table = document.getElementById('calculateTable'); 

    // Get all client names from the table
    var clientNames = Array.from(table.querySelectorAll('tr td:first-child')).map(td => td.textContent.trim());

    // Get all options from the dropdown
    var options = Array.from(dropdown.options);

    // Remove options that are in the clientNames array
    options.forEach(option => {
        if (clientNames.includes(option.textContent.trim())) {
            option.remove();
        }
    });
});

