const searchInput = document.getElementById("search_input");
const searchBtn = document.getElementById("search_submit");
const searchResults = document.getElementById("search_results");
const loader = document.getElementById("loader");
const count = document.getElementById("articles_found");

function PerformSearch() {
    const query = searchInput.value.trim();
    searchBtn.style.display = "none";
    loader.style.display = "flex";
    axios
        .get("/articles/search", {
            params: {
                query: query,
            },
        })
        .then((response) => {
            searchResults.innerHTML = response.data.view;
            searchInput.value = "";
            count.textContent = response.data.count;
        })
        .catch((error) => {
            console.error(error);
        })
        .finally(() => {
            loader.style.display = "none";
            searchBtn.style.display = "flex";
        });
}

searchBtn.addEventListener("click", function () {
    PerformSearch();
});

searchInput.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        PerformSearch();
    }
});
