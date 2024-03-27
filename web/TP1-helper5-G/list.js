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