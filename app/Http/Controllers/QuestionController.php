<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class QuestionController extends Controller
{
    public function index(User $user){
        $questions = Question::paginate(12); //Se trae las publicaciones
        return view('question.index',[
            'user' => $user,
            'questions' => $questions
        ]);
    }

    //Esto registra las preguntas
    public function store(Request $request){
        //manda a view de todas las preguntas
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            return view('question.create',[]);
        }

        $this->validate($request,[
            'question' => 'required',
            'success' => 'required',
            'incorrect1' => 'required',
            'incorrect2' => 'required'
        ],[
            'required' => 'Es necesario llenar el campo'
        ]);

        
       Question::create([
        'question'=> $request->question,
        'success' => $request->success,
        'incorrect1' => $request->incorrect1,
        'incorrect2' => $request->incorrect2
       ]);

       return redirect(route('question.index', auth()->user()->username));
    }


   //Edita preguntas
   public function edit(User $user, Question $question, Request $request){
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            return view('question.edit', [
                'question' => $question,
                'user'=> $user
            ]);
        }

        $this->validate($request,[
            'question' => 'required',
            'success' => 'required',
            'incorrect1' => 'required',
            'incorrect2' => 'required'
        ],[
            'required' => 'Es necesario llenar el campo'
        ]);

        $quest = Question::find($question->id);
        $quest->question = $request->question;
        $quest->success = $request->success;
        $quest->incorrect1 = $request->incorrect1;
        $quest->incorrect2 = $request->incorrect2;
        $quest->save();

        return redirect(route('question.index', auth()->user()->username));
    }

    //Elimina publicacion
    public function destroy(User $user, Question $question){ 
        $question->delete();
        return redirect(route('question.index', auth()->user()->username));
    }

}
