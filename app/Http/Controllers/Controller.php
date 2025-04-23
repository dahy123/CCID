<?php

namespace App\Http\Controllers;

use App\Models\Activites;
use App\Models\Operateurs;
use App\Models\Secteurs;
use App\Models\Visiteurs;
use App\Models\Rapports;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard()
    {
        $nombreOperateurs = Operateurs::count();
        $nombreSecteurs = Activites::count();
        $nombreVisiteurs = Visiteurs::count();
        // $rapportParJour = Rapports::whereDate('created_at', today())->count();
        $visiteursParJour = Visiteurs::selectRaw('DATE(created_at) as date, COUNT(*) as nombre')
                                    ->groupBy('date')
                                    ->get();
        // $topSecteurs = Activites::withCount('operateurs')
        //                       ->orderBy('activites_count', 'desc')
        //                       ->take(5)
        //                       ->get() ?? ['Commerciale','Aucun'];

        return view('dashboard', compact(
            'nombreOperateurs',
            'nombreSecteurs',
            'nombreVisiteurs',
            // 'rapportParJour',
            'visiteursParJour',
            // 'topSecteurs'
        ));
    }
}
