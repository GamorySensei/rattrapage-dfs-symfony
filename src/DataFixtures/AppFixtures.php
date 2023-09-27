<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Création des tâches complétés
        $completedTasks = [
            "Lancer le projet Symfony",
            "Charger les fixtures"
        ];
        foreach ($completedTasks as $taskName) {
            $task = new Task();
            $task->setLabel($taskName);
            $task->setCreatedAt(new \DateTimeImmutable());
            $task->setIsChecked(true);
            $task->setCheckedAt(new \DateTimeImmutable());
            $manager->persist($task);
        }

        // Création des tâches à effectuer
        $tasks = [
            "Ajouter la fonctionnalité permettant de créer une tâche",
            "Ajouter la fonctionnalité permettant de modifier une tâche",
            "Ajouter la possibilité de valider une tâche",
            "Ajouter la possibilité d'archiver une tâche",
            "Gérer l'affichage des tâches archivés ailleurs que sur la page d'accueil",
        ];

        foreach ($tasks as $taskName) {
            $newTask = new Task();
            $newTask->setLabel($taskName);
            $newTask->setCreatedAt(new \DateTimeImmutable());
            $newTask->setIsChecked(false);
            $manager->persist($newTask);
        }

        $manager->flush();
    }
}
