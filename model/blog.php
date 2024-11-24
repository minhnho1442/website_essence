<?php
function layTatCaPosts(): array{
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    return pdo_query_all($sql);
}