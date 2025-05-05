<?php

namespace App\Http\Controllers;

use App\Models\Activites;
use App\Models\Operateurs;
use App\Models\Secteurs;
use App\Models\User;
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
        $nombreUtilisateurs=User::count();
        $rapportParJour = Visiteurs::whereDate('created_at', today())->count();
        $visiteursParJour = Visiteurs::select(\DB::raw('DATE(created_at) as date'), \DB::raw('COUNT(*) as nombre'))
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->get();
        $nombreOperateursFormels = Operateurs::where('formel', true)->count();
        $nombreOperateursInformels = Operateurs::where('formel', false)->count();
        $nombreActivites = Activites::count();
        $visiteursRecents = Visiteurs::whereDate('created_at', '>=', now()->subDays(7))->count();
        $visiteursRecentsDetails = Visiteurs::whereDate('created_at', '>=', now()->subDays(7))->get();
        $topSecteurs = Activites::withCount('operateurs') // Assurez-vous que la relation 'operateurs' existe dans le modèle Secteurs
            ->orderBy('operateurs_count', 'desc')
            ->take(5)
            ->get();
        $operateursParType = Operateurs::select('type', \DB::raw('count(*) as total'))
            ->groupBy('type')
            ->pluck('total', 'type');
    
        return view('dashboard', compact(
            'nombreOperateurs',
            'nombreSecteurs',
            'nombreVisiteurs',
            'nombreUtilisateurs',
            'rapportParJour',
            'visiteursParJour', // Maintenant une collection
            'nombreOperateursFormels',
            'nombreOperateursInformels',
            'nombreActivites',
            'visiteursRecents',
            'visiteursRecentsDetails',
            'topSecteurs',
            'operateursParType'
        ));
    }
}
