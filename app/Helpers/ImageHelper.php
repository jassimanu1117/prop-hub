<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('uploadImage')) {

    /**
     * Upload an image to storage with optional thumbnail creation.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $folder
     * @param bool $createThumbnail
     * @param array $thumbSize [width, height]
     * @return array ['image' => mainPath, 'thumbnail' => thumbPath|null]
     */
    function uploadImage($file, $folder, $createThumbnail = false, $thumbSize = [150, 150])
    {
        // Ensure main folder exists
        $mainPath = "uploads/{$folder}";
        if (!Storage::exists("public/{$mainPath}")) {
            Storage::makeDirectory("public/{$mainPath}");
        }

        // Ensure thumbnail folder exists
        $thumbPath = null;
        if ($createThumbnail) {
            $thumbDir = "public/{$mainPath}/thumbnails";
            if (!Storage::exists($thumbDir)) {
                Storage::makeDirectory($thumbDir);
            }
        }

        // Generate unique filename
        $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Save main image
        $file->storeAs("public/{$mainPath}", $filename);

        // Create thumbnail if requested
        if ($createThumbnail) {
            $imgPath = $file->getRealPath();
            $extension = strtolower($file->getClientOriginalExtension());
            $image = null;

            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                if ($extension == 'png') {
                    $image = imagecreatefrompng($imgPath);
                } elseif ($extension == 'gif') {
                    $image = imagecreatefromgif($imgPath);
                } else {
                    $image = imagecreatefromjpeg($imgPath);
                }

                if ($image) {
                    $width = imagesx($image);
                    $height = imagesy($image);
                    $thumb = imagecreatetruecolor($thumbSize[0], $thumbSize[1]);

                    if ($extension == 'png' || $extension == 'gif') {
                        imagecolortransparent($thumb, imagecolorallocatealpha($thumb, 0, 0, 0, 127));
                        imagealphablending($thumb, false);
                        imagesavealpha($thumb, true);
                    }

                    imagecopyresampled($thumb, $image, 0, 0, 0, 0, $thumbSize[0], $thumbSize[1], $width, $height);

                    $thumbFile = storage_path("app/public/{$mainPath}/thumbnails/{$filename}");
                    if ($extension == 'png') imagepng($thumb, $thumbFile);
                    elseif ($extension == 'gif') imagegif($thumb, $thumbFile);
                    else imagejpeg($thumb, $thumbFile, 90);

                    imagedestroy($image);
                    imagedestroy($thumb);

                    $thumbPath = "{$mainPath}/thumbnails/{$filename}";
                }
            }
        }

        return [
            'image' => "{$mainPath}/{$filename}",
            'thumbnail' => $thumbPath
        ];
    }
}
