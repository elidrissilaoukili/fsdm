document.addEventListener("DOMContentLoaded", () => {
    const dataForm = document.getElementById("dataForm");

    loadStoredData();
    // load stored data
    function loadStoredData() {
        const savedData = localStorage.getItem("userData");
        if (savedData) {
            displayData(JSON.parse(savedData));
        }
    }
});

document.getElementById("dataForm").addEventListener("submit", (event) => {
    event.preventDefault();

    const dataForm = document.getElementById("dataForm");
    const name = document.getElementById("name").value;
    const phone = document.getElementById("phone").value;

    if (name === "" || phone === "") {
        alert("Please fill in all fields.");
        return;
    }
    const data = {
        name: name,
        phone: phone,
    };

    saveData(data);

    dataForm.reset();
});

function saveData(data) {
    let savedData = localStorage.getItem("userData");

    if (!savedData) {
        savedData = [];
    } else {
        savedData = JSON.parse(savedData);
    }
    savedData.push(data);
    localStorage.setItem("userData", JSON.stringify(savedData));

    displayData(savedData);
}

// display data
function displayData(dataArray) {
    const dataTbody = document.getElementById("dataTbody");
    dataTbody.innerHTML = "";
    dataArray.forEach((item) => {
        const listItem = document.createElement("tr");
        listItem.innerHTML = `
            <td>${item.name}</td>
            <td>${item.phone}</td>
        `;
        dataTbody.appendChild(listItem);
    });
}
