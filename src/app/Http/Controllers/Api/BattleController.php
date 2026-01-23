<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Creature;
use Illuminate\Http\Request;

class BattleController extends Controller
{
    public function battle(Request $request)
    {
        $request->validate([
            'hero_id' => 'required|exists:heroes,id',
            'creature_id' => 'required|exists:creatures,id',
        ]);

        $hero = Hero::with('artifacts')->find($request->hero_id);
        $creature = Creature::find($request->creature_id);

        // Calculate Hero Power
        $baseHeroPower = $this->getRankPower($hero->rank);
        $artifactBonus = $hero->artifacts->sum('power_level');
        $heroRoll = rand(1, 20);
        $totalHeroPower = $baseHeroPower + $artifactBonus + $heroRoll;

        // Calculate Creature Power
        $creatureBasePower = $creature->threat_level * 10; // Threat 1-10 scales to 10-100
        $creatureRoll = rand(1, 20);
        $totalCreaturePower = $creatureBasePower + $creatureRoll;

        // Determine Winner
        if ($totalHeroPower >= $totalCreaturePower) {
            $winner = 'Hero';
            $message = "{$hero->name} derrota a {$creature->name}!";
        } else {
            $winner = 'Creature';
            $message = "{$hero->name} ha caído ante {$creature->name}...";
        }

        return response()->json([
            'winner' => $winner,
            'log' => $message,
            'details' => [
                'hero' => [
                    'name' => $hero->name,
                    'base_power' => $baseHeroPower,
                    'artifact_bonus' => $artifactBonus,
                    'roll' => $heroRoll,
                    'total' => $totalHeroPower
                ],
                'creature' => [
                    'name' => $creature->name,
                    'base_power' => $creatureBasePower,
                    'roll' => $creatureRoll,
                    'total' => $totalCreaturePower
                ]
            ]
        ]);
    }

    private function getRankPower($rank)
    {
        // Simple mapping of ranks to power levels
        $ranks = [
            'Guerrero' => 50,
            'Mago' => 45,
            'Explorador' => 30,
            'Rey' => 80,
            'Hobbit' => 10
        ];

        return $ranks[$rank] ?? 20; // Default power
    }
}
