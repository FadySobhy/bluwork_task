<?php

namespace App\Http\Controllers\Api\V1\ProblemSolving;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProblemSolvingController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function problemOne(): JsonResponse
    {
        $startNumber = request('start_number');
        $endNumber = request('end_number');
        $count = 0;

        for ($i = $startNumber; $i <= $endNumber; $i++) {
            if (($i - 5) % 10 === 0){
                continue;
            }

            $count++;
        }

        return $this->successResponse(['count' => $count]);
    }

    /**
     * @return JsonResponse
     */
    public function problemTwo(): JsonResponse
    {
        $inputString = request('input_string');

        $output = 0;
        $charArray = str_split($inputString);

        for ($i = 0; $i < count($charArray); $i++) {
            $output *= 26;
            $output += ord(strtoupper($charArray[$i])) - ord('A') + 1;
        }

        return $this->successResponse(['Output' => $output]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function problemThree(Request $request): JsonResponse
    {
        $n = $request->input('n');
        $q = $request->input('q');
        $steps = [];

        for ($i = 0; $i < $n; $i++) {
            $count = 0;

            while($q[$i] !== 0) {
                $q[$i] % 2 == 0 ? $q[$i] /= 2 : $q[$i]--;
                $count++;
            }

            $steps[$i] = $count;
        }

        return $this->successResponse(['steps' => $steps]);
    }
}
