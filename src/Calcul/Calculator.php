<?php

namespace App\Calcul;

class Calculator
{
    public function CalculRemise($unitPrice, $nbProducts){
        //initialisation de toutes les variables
        $totalPrice = 0;
        $finalPrice = 0;
        $delivery = 0;
        $reduce = 0;

        //CALCUL DU PRIX TOTAL
        $totalPrice = $unitPrice*$nbProducts;

        //CALCUL DES FRAISDE PORT
        //si le prix total est inférieur à 500 on calcul les frais de port, sinon ils sont gratuits
        if ($totalPrice <= 500){
            $delivery = $totalPrice * 0.02;
            //quoi qu'il arrive les frais de port doivent être au minimum de 6€
            if ($delivery < 6){
                $delivery = 6;
            }
        }

        //CALCUL DE LA REMISE
        //si le prix total est entre 100€ et 200€
        if ($totalPrice >= 100 && $totalPrice <= 200){
            //on applique une réduction de 5%
            $reduce = $totalPrice * 0.05;
        } elseif ($totalPrice > 200){ //si le prix total est supérieur à 200€
            //on applique une réduction de 10%
            $reduce = $totalPrice * 0.1;
        } else { //si le prix total est inférieur à 100€
            //on n'applique aucune réduction
            $reduce = 0;
        }

        //CALCUL DU PRIX FINAL
        $finalPrice = $totalPrice + $delivery - $reduce;

        return [$finalPrice, $delivery, $reduce];
    }
}
