<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class IndependentPagesController extends Controller
{
    public function oddEvenCheckerPage(Request $request)
    {
        $result = '';

        if ($request->has('number')) {
            $validator = Validator::make($request->all(), [
                'number' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $result = $request->input('number') % 2 == 0 ? 'Even' : 'Odd';
        }

        return view("pages.odd-even", [
            'result' => $result,
            'value' => $request->get('number', 0),
        ]);
    }

    public function numberHoleCounterPage(Request $request)
    {
        $result = '';

        if ($request->has('number')) {
            $validator = Validator::make($request->all(), [
                'number' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $result = $this->countHoles($request->get('number'));
        }

        return view("pages.hole-counter", [
            'result' => $result,
            'value' => $request->get('number', 0),
        ]);
    }

    public function leapYearCheckerPage(Request $request)
    {
        $result = '';

        if ($request->has('year')) {
            $validator = Validator::make($request->all(), [
                'year' => 'required|integer|digits:4|regex:/^\d{4}$/',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $result = true === $this->isLeapYear($request->get('year')) ? 'is a leap year' : 'is NOT a leap year';
        }

        return view("pages.leap-year", [
            'result' => $result,
            'value' => $request->get('year', env('DEFAULT_YEAR', 1800)),
        ]);
    }

    private function isLeapYear(int $year): bool
    {
        if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
            return true;
        }
        
        return false;
    }

    private function countHoles(int $number): int
    {
        $holes = array(
            '0' => 1,
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 1,
            '5' => 0,
            '6' => 1,
            '7' => 0,
            '8' => 2,
            '9' => 1
        );

        $numStr = strval($number);
        $holeCount = 0;

        for ($i = 0; $i < strlen($numStr); $i++) {
            $digit = $numStr[$i];
            if (isset($holes[$digit])) {
                $holeCount += $holes[$digit];
            }
        }

        return $holeCount;
    }
}
