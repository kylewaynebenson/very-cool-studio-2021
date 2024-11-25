document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.querySelector('.nav-filter input[type="text"]');
  const languageSelect = document.querySelector('#language');
  const gridViewBtn = document.querySelector('#grid-view');
  const listViewBtn = document.querySelector('#list-view');
  const typeList = document.querySelector('.type-list');
  const typeItems = document.querySelectorAll('.type-preview');

  // Search functionality
  searchInput.addEventListener('input', filterItems);

  // Language filter
  languageSelect.addEventListener('change', filterItems);

  // View switching
  gridViewBtn.addEventListener('click', () => {
    typeList.classList.remove('list-view');
    typeList.classList.add('grid-view');
    listViewBtn.classList.remove('active');
    gridViewBtn.classList.add('active');
    
    // Change text to "Aa" in grid view
    document.querySelectorAll('.full-width-text').forEach(text => {
      text.dataset.originalText = text.textContent; // Store original text
      text.textContent = 'Aa';
    });
  });

  listViewBtn.addEventListener('click', () => {
    typeList.classList.remove('grid-view');
    typeList.classList.add('list-view');
    gridViewBtn.classList.remove('active');
    listViewBtn.classList.add('active');
    
    // Restore original text in list view
    document.querySelectorAll('.full-width-text').forEach(text => {
      text.textContent = text.dataset.originalText || text.textContent;
    });
  });

  function filterItems() {
    const searchTerm = searchInput.value.toLowerCase();
    const selectedLanguage = languageSelect.value.toLowerCase();

    typeItems.forEach(item => {
      const fontName = item.querySelector('h6').textContent.toLowerCase();
      const languageSupport = item.querySelector('#language-support').textContent.toLowerCase();
      
      const matchesSearch = fontName.includes(searchTerm);
      const matchesLanguage = 
        selectedLanguage === 'latin' || 
        (selectedLanguage === 'latin-ext' && languageSupport.includes('extended latin')) ||
        languageSupport.includes(selectedLanguage);

      if (matchesSearch && matchesLanguage) {
        item.style.display = '';
      } else {
        item.style.display = 'none';
      }
    });
  }
}); 