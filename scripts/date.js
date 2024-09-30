document.addEventListener("DOMContentLoaded", function() {
    const footer = document.getElementById("footer");
    const currentDate = new Date();
    const formattedDate = formatDate(currentDate);
    const dateSpan = document.getElementById("formattedDate");
    dateSpan.textContent = formattedDate;
});

function formatDate(date) {
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    return `${month}/${day}/${year}`;
}
