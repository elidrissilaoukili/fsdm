document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("dataForm");
    const dataList = document.getElementById("dataList");

    // Load stored data when the page loads
    loadStoredData();

    // Handle form submission
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        
        // Get form values
        const name = document.getElementById("name").value.trim();
        const email = document.getElementById("email").value.trim();

        if (name === "" || email === "") {
            alert("Please fill in all fields.");
            return;
        }
        // Create data object
        const data = {
            name: name,
            email: email,
        };

        // Save data to local storage
        saveData(data);

        // Clear form fields
        form.reset();
    });

    // Function to save data to local storage
    function saveData(data) {
        let savedData = localStorage.getItem("userData");

        if (!savedData) {
            savedData = [];
        } else {
            savedData = JSON.parse(savedData);
        }

        savedData.push(data);
        localStorage.setItem("userData", JSON.stringify(savedData));

        // Update displayed data
        displayData(savedData);
    }

    // Function to load and display stored data
    function loadStoredData() {
        const savedData = localStorage.getItem("userData");

        if (savedData) {
            displayData(JSON.parse(savedData));
        }
    }
    // Function to display data on the page
    function displayData(dataArray) {
        dataList.innerHTML = "";

        dataArray.forEach(function (item) {
            const listItem = document.createElement("li");
            listItem.innerHTML = `<strong>Name:</strong> ${item.name}, <strong>Email:</strong> ${item.email}`;
            dataList.appendChild(listItem);
        });
    }
});
