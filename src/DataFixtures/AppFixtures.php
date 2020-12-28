<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\ArticleEntity;
use Symfony\Component\Validator\Constraints\DateTime;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
         $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $roles[] = 'ROLE_ADMIN';

        $user->setPassword($this->passwordEncoder->encodePassword($user, 'admin'))
            ->setUsername("admin")
            ->setRoles($roles);
            
        $manager->persist($user);

        $article1 = new ArticleEntity();
        $article1->setTitle("COVID-2020, COVID-2021 et COVID-2022 déjà prévus ?")
            ->setUrlAlias("covid")
            ->setIntro("Après avoir mis en place le COVID-19, nous avons eu l'occasion de discuter avec les scénaristes de l'année 2020 qui auraient déjà anticipé avec l'arrivée de nouveaux COVID pour les années à venir.")
            ->setContent("C'est le fameux professeur Didier Raoult qui nous l'affirme : les prochaines versions du Covid sont déjà prévues. Il tient cependant à rassurer la population : il donnera tout pour combattre ces nouvelles formes.")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-11-22"));

        $manager->persist($article1);

        $article2 = new ArticleEntity();
        $article2->setTitle("Annonce du confinement nouvelle génération")
            ->setUrlAlias("confinement")
            ->setIntro("Emmanuel Macron a annoncé hier la mise en place d'un confinement nouvelle génération : à partir de demain, le nombre de personnes par maison ne devra pas dépasser 1, les autres devant trouver une nouvelle habitation.")
            ->setContent("C'est une solution radicale choisie par l'exécutif, mais nécessaire selon les dires du président : \"nous ne sommes plus en guerre désormais, mais en croisade\" pouvions nous entendre hier soir sur TF1.")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-03-16"));

        $manager->persist($article2);

        $article3 = new ArticleEntity();
        $article3->setTitle("L'université de Montpellier meilleure université de France ?")
            ->setUrlAlias("meilleure_université_montpellier")
            ->setIntro("Selon un sondage de l'IFOP, 100% des intéressés affirment que l'Université de Montpellier serait la meilleure de France.")
            ->setContent("En effet, et suite à un sondage réalisé auprès des 12 élèves du \"Bureau des Adorateurs de L'Université de Montpellier\", il en ressort que l'intégralité des étudiants de la faculté pense qu'ils sont dans la meilleure fac.")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-06-12"));

        $manager->persist($article3);

        $article4 = new ArticleEntity();
        $article4->setTitle("Fortnite nouvel enseignement obligatoire au BAC")
            ->setUrlAlias("fortnite_bac")
            ->setIntro("Après une longue délibération, Fortnite est désormais un enseignement obligatoire et une épreuve du bac, un soulagement pour les élèves.")
            ->setContent("C'est Jean Castex en personne qui l'a annoncé : Fortnite est désormais obligatoire au bac, décision prise afin de s'aligner sur la législation européenne déjà en vigueur sur le sujet.")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-09-22"));

        $manager->persist($article4);

        $article5 = new ArticleEntity();
        $article5->setTitle("Stupéfaction après la transformation du 1er janvier 2021 en 32 décembre 2020")
            ->setUrlAlias("2020_interminable")
            ->setIntro("Alors que le monde pensait être débarrassé de l'année 2020, la terreur s'est installée sur la planète avec la découverte du 32 décembre 2020 …")
            ->setContent("Stupéfaction durant la nuit de la Saint-Sylvestre dans le monde entier lorsque chacun d'entre nous découvre cette nouvelle date sur son téléphone : le 32 décembre. On est visiblement repartis pour un tour ...")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-12-31"));

        $manager->persist($article5);

        $article6 = new ArticleEntity();
        $article6->setTitle("Emmanuel macron serait un reptilien")
            ->setUrlAlias("macron_reptilien")
            ->setIntro("La nouvelle est tombée aujourd'hui : le président français serait un reptilien tentant de contrôler le peuple à l'aide de nanoparticules !!!")
            ->setContent("C'est le journal \"Le Monde\" qui avance cette découverte après avoir récolté des informations chez un proche de manu : son objectif est de nous contrôler et de nous asservir au nom de Raptor Jésus ...")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-08-13"));

        $manager->persist($article6);

        $article7 = new ArticleEntity();
        $article7->setTitle("Dumbledore serait finalement redevenu hétérosexuel selon J.K.Rowling")
            ->setUrlAlias("dumbledore")
            ->setIntro("Après avoir surpris le monde en annoncant son homosexualité, J.K.Rowling a annoncé que Dumbledore serait finalement redevenu hétérosexuel !")
            ->setContent("C'est en effet par le biais de Twitter que la nouvelle est tombée : Dumbledore re-aime uniquement les femmes !!! Les réactions sont mitigées dans la communauté, oscillants entre stupeur et colère, et c'est vrai que sa fé réfléchire ...")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-05-01"));

        $manager->persist($article7);

        $article8 = new ArticleEntity();
        $article8->setTitle("Donald Trump incorrigible !!!")
            ->setUrlAlias("trump")
            ->setIntro("Donald Trump s'est barricadé dans la maison blanche et se serait enchaîné à son bureau afin de contester les résultats de l'élection !")
            ->setContent("Après sa défaite, le monde entier se demandait quelle serait la réaction de ce bon vieux Donald, et il a encore une fois réussi à nous surprendre en s'attachant soi-même avec des chaînes à son bureau, sacré Donald haha.")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-11-03"));

        $manager->persist($article8);

        $article9 = new ArticleEntity();
        $article9->setTitle("Neuf nouvelles trilogies en préparation pour Star Wars ?")
            ->setUrlAlias("star_wars")
            ->setIntro("Disney aurait de grands projets pour Star Wars : ils auraient en effet prévu neuf nouvelles trilogies pour la saga !!!")
            ->setContent("C'est ce qu'affirme le site internet \"Fan2StarWarsAnakinTropBGObiwanLeMeilleur\", qui saurait de source sûre que Disney a pour unique objectif de se faire un MAXIMUM de thunes avec la franchise ...")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-09-08"));

        $manager->persist($article9);

        $article10 = new ArticleEntity();
        $article10->setTitle("Vague de protestation contre Cyberpunk 2077")
            ->setUrlAlias("cyberpunk")
            ->setIntro("De nombreux internautes se sont insurgés contre le jeu. La raison : nous sommes en 2020 mais l'année 2077 est précisée sur la jaquette, véritable incohérence impardonnable pour eux …")
            ->setContent("La vague de haine et d'indignation a en effet été immense sur les réseaux sociaux : pourquoi avoir choisi l'année 2077 à la place de 2020 ???? Moi même qui écrit l'article je ne comprends pas, c'est vraiment chaud ...")
            ->setPublished(\DateTime::createFromFormat('Y-m-d', "2020-12-05"));

        $manager->persist($article10);

        $manager->flush();
    }
}
