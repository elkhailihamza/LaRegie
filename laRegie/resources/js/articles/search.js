const searchInput = document.getElementById("search_input");
const searchType = document.getElementById("search_type");
const searchBtn = document.getElementById("search_submit");
const searchResults = document.getElementById("search_results");
const loader = document.getElementById("loader");
const count = document.getElementById("articles_found");

function PerformSearch() {
    const query = searchInput.value.trim();
    const type = searchType.value;
    searchBtn.style.display = "none";
    loader.style.display = "flex";
    axios
        .get("/articles/search", {
            params: {
                query: query,
                type: type,
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

function ChangeSearchInputPlaceholder() {
    const searchTypeText = searchType.options[searchType.selectedIndex];
    searchInput.placeholder = "Rechercher par " + searchTypeText.innerText;
}

searchBtn.addEventListener("click", function () {
    PerformSearch();
});

searchInput.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        PerformSearch();
    }
});

searchType.addEventListener("change", function () {
    ChangeSearchInputPlaceholder();
});
