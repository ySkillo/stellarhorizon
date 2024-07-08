function loadLanguage(language) {
    fetch('assets/javascript/translations.json')
    .then(response => response.json())
    .then(translations => {

        // Language Nav-bar  
        document.getElementById('nav_home').textContent = translations[language].nav_home;
        document.getElementById('nav_about').textContent = translations[language].nav_about;
        document.getElementById('nav_services').textContent = translations[language].nav_services;
        document.getElementById('nav_team').textContent = translations[language].nav_team;
        document.getElementById('nav_projects').textContent = translations[language].nav_projects;
        document.getElementById('nav_contacts').textContent = translations[language].nav_contacts;

        //  Language Message cards/icons social
        document.getElementById('textMessage_icon_social_instagram_main').textContent = translations[language].textMessage_icon_social;
        document.getElementById('textMessage_icon_social_facebook_main').textContent = translations[language].textMessage_icon_social;
        document.getElementById('textMessage_icon_social_twitter_main').textContent = translations[language].textMessage_icon_social;
        


    })
    .catch(error => console.error('Error loading translations:', error));
}

function selectLanguage() {
    const valor = document.getElementById("language-select").value;
    loadLanguage(valor);
    localStorage.setItem('preferred', valor);
}

function loadPreferred() {
    const preferred = localStorage.getItem('preferred') || 'pt';
    document.getElementById('language-select').value = preferred;
    loadLanguage(preferred);
}

window.onload = loadPreferred;
