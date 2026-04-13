<?php

namespace App\Support;

class MediaUrl
{
    public static function resolve(?string $path, string $fallback, array $legacyDirectories = []): string
    {
        $normalized = self::normalize($path);

        if ($normalized === null) {
            return $fallback;
        }

        if (preg_match('#^(https?:)?//#i', $normalized) === 1) {
            return $normalized;
        }

        if (str_starts_with($normalized, '/')) {
            return $normalized;
        }

        if (file_exists(public_path($normalized))) {
            return '/' . ltrim(str_replace('\\', '/', $normalized), '/');
        }

        if (file_exists(storage_path('app/public/' . $normalized))) {
            return '/storage/' . ltrim(str_replace('\\', '/', $normalized), '/');
        }

        $basename = basename($normalized);

        foreach ($legacyDirectories as $directory) {
            $candidate = trim($directory, '/\\') . '/' . $basename;

            if (file_exists(public_path($candidate))) {
                return '/' . str_replace('\\', '/', $candidate);
            }
        }

        return $fallback;
    }

    private static function normalize(?string $path): ?string
    {
        $path = trim((string) $path);

        if ($path === '') {
            return null;
        }

        return ltrim(str_replace('\\', '/', $path), '/');
    }
}
