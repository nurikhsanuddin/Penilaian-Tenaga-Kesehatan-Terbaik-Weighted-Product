<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Criteria;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        $this->authorize('view', User::class);
        $this->authorize('view', Criteria::class);
        $this->authorize('view', Assessment::class);

        $employees = User::where('role', 'karyawan')->count();
        $criterias_total = Criteria::count();

        $month = ltrim(date('m'), '0');
        $year = date('Y');

        $criterias = Criteria::all();

        $resultsWj = [];
        $total = 0;
        $status = 'kosong';
        // Hitung total bobot
        foreach ($criterias as $criteria) {
            $total += $criteria->weight;
        }

        // Normalisasi bobot dan siapkan data kriteria
        foreach ($criterias as $criteria) {
            $weightCorrection = $criteria->weight / $total;
            $resultsWj[] = [
                'category' => $criteria->category,
                'weightCorrection' => $weightCorrection
            ];
        }

        // Ambil data penilaian
        $assessments = Assessment::where('month', $month)
            ->where('year', $year)
            ->get()
            ->groupBy('user_uuid')
            ->map(function ($group, $userUuid) {
                return [
                    'user_uuid' => $userUuid,
                    'values' => $group->pluck('value')->toArray()
                ];
            })
            ->values()
            ->toArray();

        if ($assessments) {
            $resultsSi = [];

            // Hitung nilai Si
            foreach ($assessments as $row) {
                $product = 1;
                $values = $row['values'];

                for ($i = 0; $i < count($values); $i++) {
                    $category = $resultsWj[$i]['category'];
                    $weightCorrection = $resultsWj[$i]['weightCorrection'];

                    // Adjust weight for Benefit or Cost
                    $adjustedWeightCorrection = $category === 'Benefit' ? $weightCorrection : -$weightCorrection;

                    // Calculate product
                    $product *= pow($values[$i], $adjustedWeightCorrection);
                }

                $resultsSi[] = [
                    'user_uuid' => $row['user_uuid'],
                    'si' => $product
                ];
            }

            // Hitung total Si
            $totalSi = array_sum(array_column($resultsSi, 'si'));

            $resultsVi = [];

            // Hitung nilai Vi
            foreach ($resultsSi as $resultSi) {
                $vi = $resultSi['si'] / $totalSi;

                $userUuid = $resultSi['user_uuid'];

                $user = User::where('uuid', $userUuid)->first();

                if ($user) {
                    $name = $user->name;
                } else {
                    $name = "Unknown";
                }

                $resultsVi[] = [
                    'user_uuid' => $resultSi['user_uuid'],
                    'vi' => $vi,
                    'name' => $name
                ];
            }

            // Ambil nilai maksimum dari Vi
            $maxVi = max(array_column($resultsVi, 'vi'));
            $status = 'ada';
            return view('dashboard.index', compact('resultsWj', 'resultsSi', 'resultsVi', 'employees', 'criterias_total', 'month', 'year', 'maxVi', 'status'));
        } else {
            return view('dashboard.index', compact('employees', 'criterias_total', 'status'));
        }
    }
}
