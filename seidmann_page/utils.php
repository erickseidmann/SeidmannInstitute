<!-- utils.php -->
<?php
// Função para converter array em string
function arrayToString($value) {
    if (is_array($value)) {
        return implode(", ", $value);
    }
    return $value;
}
?>