<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ResultProjectController extends Controller
{
    public function index($id)
    {
        $project = Project::find($id);
        if (!$project) {
            abort(404); // Display a 404 error page or handle it as needed
        }
        return view('result-project', ['project' => $project]);
    }

    public function executePythonScript(Request $request)
    {
        $selectedArchitecture = $request->input('architecture');
        $epoch = $request->input('epoch');

        switch ($selectedArchitecture) {
            case 'inceptionv3':
                $scriptPath = 'C:\Nabell\STTN\Tugas Akhir\laravel-dataset\public\python\inception.py';
                break;
            case 'alexnet':
                $scriptPath = 'C:\Nabell\STTN\Tugas Akhir\laravel-dataset\public\python\alexnet.py';
                break;
            case 'densenet121':
                $scriptPath = 'C:\Nabell\STTN\Tugas Akhir\laravel-dataset\public\python\densenet121.py';
                break;
            case 'vgg16':
                $scriptPath = 'C:\Nabell\STTN\Tugas Akhir\laravel-dataset\public\python\vgg16.py';
                break;
            default:
                return response("Unknown architecture.", 400);
        }

        $pythonPath = 'C:\Program Files\Python311\python.exe'; // Path to your Python interpreter
        $command = "\"{$pythonPath}\" \"{$scriptPath}\""; // Added the missing closing double quote
        $output = shell_exec($command);

        return view('python_output', ['output' => $output]);
    }
}
