<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function store(Request $request)
    {
        try {
            $reply = $request->all();
            $reply['user_id'] = 1;

            $thread = \App\Thread::find($request->thread_id);
            $thread->replies()->create($reply);

            flash('Resposta publicada com sucesso')->success();
            return redirect()->back();
        } catch (\Exception $e) {
            $message = env('APP_DEBUG') ? $e->getMessage() : 'Erro ao processar sua requisição';

            flash($message)->warning();
            return redirect()->back();
        }
    }
}
