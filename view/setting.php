<!-- setting.php -->
<?php
session_start();

if (isset($_POST['language'])) {
  $_SESSION['selected_language'] = $_POST['language'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings</title>
</head>
<body>
  <span>
    <div class="translate" id="google_translate_element"></div>
    <form id="languageForm" method="post" style="display: none;">
      <input type="hidden" id="selectedLanguage" name="language">
    </form>
    <script type="text/javascript">
      function googleTranslateElementInit() {
        new google.translate.TranslateElement(
          { pageLanguage: 'en' },
          'google_translate_element'
        );

        // Add event listener to capture language change
        var translateElement = document.getElementById('google_translate_element');
        translateElement.addEventListener('change', function(event) {
          var selectedLanguage = event.target.value;
          document.getElementById('selectedLanguage').value = selectedLanguage;
          document.getElementById('languageForm').submit();
        });
      }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  </span>

  <!-- Button to return to the configured URL -->
  <a href="/projet_v3/projet/view/front/offres.php">Return</a>
</body>
</html>