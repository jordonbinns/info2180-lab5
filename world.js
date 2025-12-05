window.onload = function () {
    const lookupButton = document.getElementById("lookup");
    const resultDiv = document.getElementById("result");
    const countryInput = document.getElementById("country");

    lookupButton.addEventListener("click", function () {
        let country = countryInput.value.trim();

        // Build URL to send to world.php
        let url = "world.php?country=" + country;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                resultDiv.innerHTML = data;   // Display PHP output
            })
            .catch(error => console.error("Error:", error));
    });
};
