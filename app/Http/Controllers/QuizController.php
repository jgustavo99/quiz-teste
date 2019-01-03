<?php

namespace App\Http\Controllers;

/**
 * QuizController
 *
 * @author João Gustavo Balestrin dos Santos <joaogustavo.b@hotmail.com>
 * @copyright (c) 2018
 * @package Quiz
 */
class QuizController extends Controller
{
    /**
     * Retorna a tela inicial do quiz
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('quiz.index');
    }

    /**
     * Retorna a tela final do quiz (Resultado)
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish()
    {
        // Captura os valores selecionados na sessão
        $flags = session('quiz.flag_displayed');
        $answers = session('quiz.answers');

        // Limpa a sessão do quiz
        session()->flush();

        return view('quiz.finish', compact('flags', 'answers'));
    }
}
