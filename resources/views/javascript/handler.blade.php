(function() {
    var placeholder = document.getElementById('<?php echo $key ?>');

    if (!placeholder) {
        return;
    }

    placeholder.innerHTML = <?php echo json_encode($data); ?>;
})();