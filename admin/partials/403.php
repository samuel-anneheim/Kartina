<?php
http_response_code(403);
require_once __DIR__.'/navbar.php'; ?>

<div class="container">
    <h1>403 interdit</h1>
</div>

<?php
require_once __DIR__.'/footer.php';
exit; 
?>