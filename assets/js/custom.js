(function () {
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 1,
        dayMonth = "09/30/",
        birthday = dayMonth + yyyy;

    today = mm + "/" + dd + "/" + yyyy;
    if (today > birthday) {
        birthday = dayMonth + nextYear;
    }
    //end

    const countDown = new Date(birthday).getTime(),
        x = setInterval(function() {

            const now = new Date().getTime(),
                distance = countDown - now;
                document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

            //seconds
        }, 0)
}());

// Function to show an alert for desktop users
function showAlertForDesktop() {
    alert('Sorry, this website is not accessible from desktop devices. Please visit from a mobile device.');
    window.location.replace("https://www.google.com/");
}

// Function to check if the user is browsing from a desktop device
function isDesktop() {
    return window.innerWidth > 992; // You can adjust the threshold width as needed
}

// Check if the user is browsing from a desktop device and show the alert
if (isDesktop()) {
    showAlertForDesktop();
}
