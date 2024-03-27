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
}

function cancel() {
    document.getElementById("dataForm").reset();
}
