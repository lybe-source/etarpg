<?php

namespace App\Form\_partials;

class Choice {

    public function getCategoryChoice(): array
    {
        return [
            "Casque" => "Casque", // Helmet
            "Amulette" => "Amulette", // Amulet
            "Torse" => "Torse", // Chest
            "Gant" => "Gant", // Glove
            "Arme" => "Arme", // Weapon
            "Bouclier" => "Bouclier", // Shield
            "Ceinture" => "Ceinture", // Belt
            "Pantalon" => "Pantalon", // Trouser
            "Botte" => "Botte", // Boot
            "Bague" => "Bague", // Ring
        ];
    }

    /**
     * Nom des statistiques
     */
    public function getStatNameChoice(): array
    {
        return [
            "Très faible" => "Très faible", // Very weak
            "Faible" => "Faible", // Weak
            "Bonne" => "Bonne", // Good
            "Très bonne" => "Très bonne", // Very good
        ];
    }

    /**
     * Montant de statistique
     * par exemple : 10 points d'attaque ou 10 point d'armure
     */
    public function getAmountChoice(): array
    {
        return [
            "5" => 5,
            "10" => 10,
            "15" => 15,
            "20" => 20
        ];
    }

    /**
     * Nom des raretés
     */
    public function getDropRateNameChoice(): array
    {
        return [
            "Commun" => "Commun", // Common
            "Rare" => "Rare",
            "Épique" => "Épique", // Epic
        ];
    }

    /**
     * Pourcentage de chance de loot l'item
     * par exemple : 2%
     */
    public function getDropRateChoice(): array
    {
        return [
            "75" => 75,
            "50" => 50,
            "20" => 20
        ];
    }
}