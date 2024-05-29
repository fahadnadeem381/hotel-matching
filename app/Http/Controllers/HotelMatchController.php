<?php
namespace App\Http\Controllers;
use OpenAI\Testing\ClientFake;
use OpenAI\Responses\Completions\CreateResponse;

use Illuminate\Http\Request;

class HotelMatchController extends Controller
{
    public function index(){
        $client = new ClientFake([
            CreateResponse::fake([
                'choices' => [
                    [
                        'text' => 'awesome!',
                    ],
                ],
            ]),
        ]);
        
        $completion = $client->completions()->create([
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => 'PHP is ',
        ]);
        
        $openai_response    =   $completion->choices[0]->text;
        $data               =   array(
            'ai_response'      =>  $openai_response,
        );
        return view('dashboard',$data);
    }
}






