document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('templateSearch');
    const searchResults = document.getElementById('searchResults');
    const searchResultsContent = searchResults.querySelector('.search-results-content');
    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();

        if (query.length < 2) {
            searchResults.style.display = 'none';
            return;
        }

        searchTimeout = setTimeout(() => {
            fetch(`/search-templates?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        searchResultsContent.innerHTML = '<div class="search-result-item">No templates found</div>';
                        searchResults.style.display = 'block';
                        return;
                    }

                    searchResultsContent.innerHTML = data.map(template => `
                        <a href="/market-place/${template.slug}" class="search-result-item">
                            <img src="${template.feature_image}" alt="${template.name}" class="search-result-thumbnail">
                            <div class="search-result-info">
                                <span class="search-result-name">${template.name}</span>
                                <span class="search-result-description">${template.description}</span>
                            </div>
                        </a>
                    `).join('');

                    searchResults.style.display = 'block';
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                    searchResults.style.display = 'none';
                });
        }, 300);
    });

    // Close search results when clicking outside
    document.addEventListener('click', function(event) {
        if (!searchInput.contains(event.target) && !searchResults.contains(event.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Prevent form submission on enter key
    searchInput.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
}); 