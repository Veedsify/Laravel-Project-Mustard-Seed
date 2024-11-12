<?php

namespace App\Services;

use Aws\Rekognition\RekognitionClient;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RekognitionService
{
    protected $client;

    public function __construct()
    {
            $credentials = new \Aws\Credentials\Credentials(
                env('AWS_ACCESS_KEY_ID'),
                env('AWS_SECRET_ACCESS_KEY')
            );
            $this->client = new RekognitionClient([
                'version' => 'latest',
                'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
                'credentials' => $credentials,
            ]);
    }

    public function detectLabels($imagePath)
    {
        try {
            $image = Storage::get($imagePath);

            $result = $this->client->detectLabels([
                'Image' => [
                    'Bytes' => $image,
                ],
                'MaxLabels' => 10,
                'MinConfidence' => 70,
            ]);

            return $result['Labels'];
        } catch (\Exception $e) {
            Log::error('Rekognition error: ' . $e->getMessage());
            return [];
        }
    }

    public function detectFaces($imagePath)
    {
        try {
            $image = Storage::get($imagePath);
            Log::info('Image: ' . $image);
            $result = $this->client->detectFaces([
                'Image' => [
                    'Bytes' => $image,
                ],
                'Attributes' => ['ALL'],
            ]);

            return $result['FaceDetails'];
        } catch (\Exception $e) {
            Log::error('Rekognition error: ' . $e->getMessage());
            return [];
        }
    }

    public function compareFaces($sourceImage, $targetImage)
    {
        try {
            $sourceImage = Storage::get($sourceImage);
            $targetImage = Storage::get($targetImage);

            $result = $this->client->compareFaces([
                'SourceImage' => [
                    'Bytes' => $sourceImage,
                ],
                'TargetImage' => [
                    'Bytes' => $targetImage,
                ],
                'SimilarityThreshold' => 70,
            ]);

            return $result['FaceMatches'];
        } catch (\Exception $e) {
            Log::error('Rekognition error: ' . $e->getMessage());
            return [];
        }
    }

    public function extractText($imagePath)
    {
        try {
            $image = Storage::get($imagePath);

            $result = $this->client->detectText([
                'Image' => [
                    'Bytes' => $image,
                ],
            ]);

            return $result['TextDetections'];
        } catch (\Exception $e) {
            Log::error('Rekognition error: ' . $e->getMessage());
            return '';
        }
    }
}
