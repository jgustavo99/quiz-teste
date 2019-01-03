<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * StepController
 *
 * @author João Gustavo Balestrin dos Santos <joaogustavo.b@hotmail.com>
 * @copyright (c) 2018
 * @package Quiz
 */
class StepController extends Controller
{
    /**
     * Exibe as etapas do Quiz
     *
     * @param $step
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($step)
    {
        // Captura a bandeira
        if (session('quiz.answers.' . $step)) {
            $flag_sorted = array_last(session('quiz.flag_displayed'));
        } else {
            $flags = array_diff(config('quiz.flags'), session('quiz.flag_displayed', []));
            $flag_sorted = array_random($flags);
        }

        // Captura as alternativas
        $alternatives = $this->shuffle(config('quiz.alternatives.' . $flag_sorted));

        // Persiste a sessão
        if (!session('quiz.flag_displayed')) {
            session([
                'quiz.flag_displayed' => [$flag_sorted],
                'quiz.answers' => [
                    1 => true
                ],
            ]);
        } else {
            if (!session('quiz.answers.' . $step)) {
                $flag_displayed = session('quiz.flag_displayed');
                array_push($flag_displayed, $flag_sorted);

                session([
                    'quiz.flag_displayed' => $flag_displayed,
                    'quiz.answers' => array_replace(session('quiz.answers'), [$step => true])
                ]);
            }
        }

        return view('quiz.step', compact('step', 'flag_sorted', 'alternatives'));
    }

    /**
     * Salva a resposta e redireciona para a próxima etapa
     *
     * @param $step
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function save($step, Request $request)
    {
        if (request('selected_answer', false) === false) {
            return 'Ocorreu um erro, tente novamente!';
        }

        // Salva na sessão a resposta
        session([
            'quiz.answers' => array_replace(session('quiz.answers'), [$step => $request->get('selected_answer')])
        ]);

        // Redireciona para o próximo passo
        if (($step+1) > config('quiz.last_step')) {
            return redirect(route('quiz.finish'));
        }

        return redirect(route('quiz.step', [$step+1]));
    }

    /**
     * Ordena o array aleatóriamente mantendo o indíce
     *
     * @param $array
     *
     * @return array
     */
    protected function shuffle($array) {
        $result = [];
        $keys = array_keys($array);

        for ($count = count($array); $count > 0; $count--) {
            $index = random_int(0, $count - 1);
            $result[$keys[$index]] = $array[$keys[$index]];

            if ($index < $count - 1) {
                $keys[$index] = $keys[$count - 1];
            }
        }

        return $result;
    }
}
