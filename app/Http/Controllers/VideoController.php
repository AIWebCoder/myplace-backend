<?php

namespace App\Http\Controllers;

use Exception;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Validation\ValidationException;

class VideoController extends Controller
{
    public function uploadVideo(Request $request)
    {
        $fileId = Uuid::uuid4()->getHex();
        try {
            $url = '';
            $path = '';
            Log::info('Video upload started');
            
            // Log the files sent in the request
            Log::info('Files in request: ' . json_encode($request->allFiles()));
            
            if ($request->hasFile('video')) {

                Log::info('Video file detected');
                
                // Get video file details
                $videoFile = $request->file('video');
                Log::info('Video file: ' . $videoFile->getClientOriginalName());
                
                // Store the video and generate the URL
                $path = $videoFile->store('videos', 'public');
                $url = Storage::url($path);
                
                Log::info('File stored at: ' . $path);
                Log::info('Public URL: ' . $url);

            } else {
                Log::warning('No video file found');
            }

            return response()->json([
                'message' => 'Video uploaded successfully.',
                'stored_path' => $path,
                'public_url' => $url,
            ]);
        } catch (ValidationException $e) {
            Log::error('Validation failed: ' . json_encode($e->errors()));
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            Log::error('Video upload failed: ' . $e->getMessage());
            return response()->json([
                'message' => 'Something went wrong during upload.',
            ], 500);
        }
    }

    public function splitVideoBySize(Request $request)
    {
        $ffmpegPath = 'C:\ffmpeg\bin\ffmpeg.exe'; 

        $video = $request->file('video');
        $relativePath = $video->store('videos');
        $inputPath = storage_path("app/public/{$relativePath}");
        $outputDir = storage_path("app/chunks");

        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $outputPattern = str_replace('\\', '/', $outputDir) . '/chunk_%03d.mp4';

        Log::info("Using FFmpeg to split: $inputPath -> $outputPattern");

        $process = new Process([
            $ffmpegPath,
            '-i', $inputPath,
            '-map', '0',
            '-f', 'segment',
            '-segment_time', '2',
            '-g', '25', // optional: GOP size
            '-force_key_frames', 'expr:gte(t,n_forced*2)',
            '-reset_timestamps', '1',
            $outputPattern,
        ]);
        
        Log::info("Running FFmpeg with command: " . $process->getCommandLine());

        $process->run();

        if (!$process->isSuccessful()) {
            Log::error($process->getErrorOutput()); 
            throw new ProcessFailedException($process);
        }

        return response()->json([
            'message' => 'Video split successfully.',
            'stored_path' => $relativePath,
            'input_path' => $inputPath,
            'chunks_dir' => $outputDir
        ]);
    }
}




