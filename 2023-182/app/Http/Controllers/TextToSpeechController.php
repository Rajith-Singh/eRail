<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;

class TextToSpeechController extends Controller
{
    public function convertTextToSpeech()
    {
        $textToSpeechClient = new TextToSpeechClient();
        $inputText = "Hello, this is a test.";
        $voice = ['languageCode' => 'en-US', 'name' => 'en-US-Wavenet-D'];

        $response = $textToSpeechClient->synthesizeSpeech(
            (new SynthesisInput())->setText($inputText),
            (new VoiceSelectionParams())->setLanguageCode($voice['languageCode'])->setName($voice['name']),
            (new AudioConfig())->setAudioEncoding(AudioEncoding::LINEAR16)
        );

        $audioContent = $response->getAudioContent();

        // Output the audio content as an audio file
        header('Content-Type: audio/wav');
        echo $audioContent;
        exit();
    }
}
