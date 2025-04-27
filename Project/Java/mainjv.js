document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("loginModal");
    var btn = document.getElementById("openModal");
    var span = document.querySelector(".close");

    if (btn && modal) {
        btn.addEventListener("click", function () {
            modal.style.display = "block";
        });

        span?.addEventListener("click", function () {
            modal.style.display = "none";
        });

        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    }

    // FILTRAVIMAS
    const filterBtn = document.getElementById("filter-btn");
    const filterMenu = document.getElementById("filter-menu");
    const applyFilterBtn = document.getElementById("apply-filter");
    const items = document.querySelectorAll(".item");

    if (filterBtn && filterMenu) {
        filterBtn.addEventListener("click", function () {
            filterMenu.style.display = filterMenu.style.display === "block" ? "none" : "block";
        });
    }

    if (applyFilterBtn) {
        applyFilterBtn.addEventListener("click", function () {
            let checkedFilters = Array.from(document.querySelectorAll(".filter-checkbox:checked"))
                .map(checkbox => checkbox.getAttribute("data-filter"));

            filterItems(checkedFilters);
        });
    }

    function filterItems(filters) {
        let sortedItems = Array.from(items);

        sortedItems.sort((a, b) => {
            for (let filter of filters) {
                let valueA = a.dataset[filter];
                let valueB = b.dataset[filter];

                if (filter === "abc") {
                    let comparison = a.textContent.localeCompare(b.textContent);
                    if (comparison !== 0) return comparison; 
                } else {
                    let numComparison = parseFloat(valueB) - parseFloat(valueA);
                    if (numComparison !== 0) return numComparison;
                }
            }
            return 0;
        });
    }
});
document.getElementById('goHome').addEventListener('click', function() {
    window.location.href = 'Main.html'; // Arba tavo pagrindinio puslapio pavadinimas
});