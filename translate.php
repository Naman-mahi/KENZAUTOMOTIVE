<?php
// Function to translate text using LibreTranslate API
function translateContentLibreTranslate($text, $targetLanguage) {
    $url = 'https://libretranslate.com/translate';
    
    // Prepare the data for the API request
    $data = [
        'q' => $text,
        'source' => 'en',
        'target' => $targetLanguage,
        'format' => 'text',
        'api_key' => '' // Add your LibreTranslate API key here
    ];
    
    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Send as JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    // Execute the request and get the response
    $response = curl_exec($ch);
    
    // Check for cURL errors
    if(curl_errno($ch)) {
        return 'Translation Error: ' . curl_error($ch);
    }
    
    curl_close($ch);
    
    // Decode the JSON response and return the translated text
    $responseData = json_decode($response, true);
    return isset($responseData['translatedText']) ? $responseData['translatedText'] : 'Translation failed';
}

// Initialize variables
$originalText = '';
$translatedText = '';
$targetLanguage = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['original_text']) && isset($_POST['language'])) {
        $originalText = trim($_POST['original_text']);
        $targetLanguage = trim($_POST['language']);
        
        if (!empty($originalText)) {
            // Perform translation
            $translatedText = translateContentLibreTranslate($originalText, $targetLanguage);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Translator - LibreTranslate API</title>
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center">Translate Text Using LibreTranslate API</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form method="POST" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="original_text" class="form-label">Original Text</label>
                    <textarea name="original_text" id="original_text" class="form-control" rows="5" required><?php echo htmlspecialchars($originalText); ?></textarea>
                    <div class="invalid-feedback">
                        Please enter text to translate.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="language" class="form-label">Select Language to Translate To</label>
                    <select name="language" id="language" class="form-select" required>
                        <option value="">Select a language</option>
                        <option value="es" <?php echo ($targetLanguage == 'es') ? 'selected' : ''; ?>>Spanish</option>
                        <option value="fr" <?php echo ($targetLanguage == 'fr') ? 'selected' : ''; ?>>French</option>
                        <option value="de" <?php echo ($targetLanguage == 'de') ? 'selected' : ''; ?>>German</option>
                        <option value="it" <?php echo ($targetLanguage == 'it') ? 'selected' : ''; ?>>Italian</option>
                        <option value="pt" <?php echo ($targetLanguage == 'pt') ? 'selected' : ''; ?>>Portuguese</option>
                        <option value="ru" <?php echo ($targetLanguage == 'ru') ? 'selected' : ''; ?>>Russian</option>
                        <option value="ar" <?php echo ($targetLanguage == 'ar') ? 'selected' : ''; ?>>Arabic</option>
                        <option value="zh" <?php echo ($targetLanguage == 'zh') ? 'selected' : ''; ?>>Chinese</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a language.
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-language me-2"></i>Translate
                </button>
            </form>
        </div>
    </div>

    <?php if ($translatedText): ?>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <h3 class="text-center">Translated Text</h3>
                <div class="alert alert-success" role="alert">
                    <strong>Translation:</strong> <?php echo htmlspecialchars($translatedText); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap 5.3 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Form validation
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>
</body>
</html>
