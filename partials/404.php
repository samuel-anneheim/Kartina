<?php
http_response_code(404);
require_once __DIR__.'/navbar.php'; ?>

<div class="container">
    <h1>Page Non trouvé</h1>
</div>

<?php
require_once __DIR__.'/footer.php';
exit; 
?>