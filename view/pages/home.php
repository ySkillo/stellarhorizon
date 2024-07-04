<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
    <script>
        function loadTranslations(language) {
            fetch('translations.json')
                .then(response => response.json())
                .then(translations => {
                    document.getElementById('welcome').textContent = translations[language].welcome;
                    document.getElementById('description').textContent = translations[language].description;
                })
                .catch(error => console.error('Error loading translations:', error));
        }

        function changeLanguage() {
            const language = document.getElementById('languageSelector').value;
            loadTranslations(language);
            localStorage.setItem('preferredLanguage', language);
        }

        function loadPreferredLanguage() {
            const preferredLanguage = localStorage.getItem('preferredLanguage') || 'pt';
            document.getElementById('languageSelector').value = preferredLanguage;
            loadTranslations(preferredLanguage);
        }

        window.onload = loadPreferredLanguage;
    </script>
</head>
<body>
    <select id="languageSelector" onchange="changeLanguage()">
        <option value="pt">Português</option>
        <option value="es">Espanhol</option>
        <option value="en">Inglês</option>
    </select>

    <h1 id="welcome">Bem-vindo ao meu site!</h1>
    <p id="description">Este é um exemplo de site com tradução automática.</p>
</body>
</html>
