window.onload = function () {
    const lookupButton = document.getElementById("lookup");
    const lookupCitiesButton = document.getElementById("lookup-cities");
    const resultDiv = document.getElementById("result");
    const countryInput = document.getElementById("country");

    // COUNTRY LOOKUP
    lookupButton.addEventListener("click", function () {
        let country = countryInput.value.trim();
        let url = "world.php?country=" + country;

        fetch(url)
            .then(response => response.text())
            .then(data => resultDiv.innerHTML = data);
    });

    // CITY LOOKUP
    lookupCitiesButton.addEventListener("click", function () {
        let country = countryInput.value.trim();
        let url = "world.php?country=" + country + "&lookup=cities";

        fetch(url)
            .then(response => response.text())
            .then(data => resultDiv.innerHTML = data);
    });
};
