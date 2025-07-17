<?php

if (! function_exists('formatBytes')) {
    /**
     * Formats bytes into a human-readable string (KB, MB, GB, etc.).
     *
     * @param int|null $bytes
     * @param int $precision
     * @return string
     */
    function formatBytes($bytes, $precision = 2) {
        if ($bytes === null || !is_numeric($bytes) || $bytes < 0) {
            return 'N/A';
        }
        if ($bytes === 0) {
            return '0 B';
        }

        $base = log($bytes, 1024);
        $suffixes = ['B', 'KB', 'MB', 'GB', 'TB'];

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }
}
