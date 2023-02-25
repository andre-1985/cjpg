<?php

namespace App\Controller;

use App\Form\GridEuromillionsType;
use App\Repository\DrawEuromillionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;

class GridEuromillionsController extends AbstractController
{
    /**
     * @param Request $request
     * @param DrawEuromillionsRepository $repository
     * @return Response
     */
    #[Route('/grilleEuromillions', name: 'app_grid_euromillions', methods: ['GET', 'POST'])]
    public function index(Request $request, DrawEuromillionsRepository $repository): Response
    {
        $form = $this->createFormBuilder(null, [
            'constraints' => [
                new Assert\Callback(
                    ['callback' => static function (array $data, ExecutionContextInterface $context) {
                        if (empty($data['gridEuromillions']['userBallsSelection']) && empty($data['gridEuromillions']['userStarsSelection'])) {
                            $context
                                ->buildViolation('Vous devez sélectionner au moins un numéro (boule ou étoile) !')
                                ->addViolation()
                            ;
                        }

                        if (count($data['gridEuromillions']['userBallsSelection']) > 5 && count($data['gridEuromillions']['userStarsSelection']) > 2) {
                            $context
                                ->buildViolation('Vous avez sélectionner trop de numéros, maximum 5 et trop d\' étoiles, maximum 2 !')
                                ->addViolation()
                            ;
                        }
                        elseif (count($data['gridEuromillions']['userBallsSelection']) > 5) {
                            $context
                                ->buildViolation('Vous avez sélectionner trop de numéros, maximum 5 !')
                                ->addViolation()
                            ;
                        }
                        elseif (count($data['gridEuromillions']['userStarsSelection']) > 2) {
                            $context
                                ->buildViolation('Vous avez sélectionné trop d\' étoiles, maximum 2 !')
                                ->addViolation()
                            ;
                        }
                    }]
                )
            ]
        ])
            ->add('gridEuromillions', GridEuromillionsType::class)
            ->add('validate', SubmitType::class)
            ->getForm()
        ;

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if (!empty($data['gridEuromillions']['userBallsSelection']) && !empty($data['gridEuromillions']['userStarsSelection']))
            {

//            Création du tableau contenant
//            les boules choisies par l'utilisateur

                $userBalls = $data['gridEuromillions']['userBallsSelection'];
                $userSelection['userBalls'] = $userBalls;

//            Création du tableau contenant
//            les étoiles choisies par l'utilisateur

                $userStars = $data['gridEuromillions']['userStarsSelection'];
                $userSelection['userStars'] = $userStars;

//            requete de tous les tirages avec au moins une boule
//            ou un numéro chance en commun avec la sélection utilisateur.

                $userSelectionRequest = $repository->findDrawsByUserSelection($userBalls, $userStars);
                foreach ($userSelectionRequest as $userSelectionRq) {
                    $userResultsDrawId = 'draw_' . $userSelectionRq->getId();
                    $ballsRq = $userSelectionRq->getBallsArray();
                    $starsRq = $userSelectionRq->getStarsArray();
                    $userCommonBallsArray = array_intersect($userBalls, $ballsRq);
                    $userCommonStarsArray = array_intersect($userStars, $starsRq);
                    if (count($userCommonStarsArray) > 0 && count($userCommonBallsArray) > 0) {
                        $unsortedUserResults[$userResultsDrawId] = [
                            'userCommonBallsArray' => $userCommonBallsArray,
                            'userCommonStarsArray' => $userCommonStarsArray,
                            'completeDraw' => $userSelectionRq
                        ];
                    } elseif (count($userCommonStarsArray) > 0 && count($userCommonBallsArray) == 0) {
                        $userResultsOnlyStar[$userResultsDrawId] = [
                            'userCommonStarsArray' => $userCommonStarsArray,
                            'completeDraw' => $userSelectionRq
                        ];
                    } else {
                        $unsortedUserResults[$userResultsDrawId] = [
                            'userCommonBallsArray' => $userCommonBallsArray,
                            'completeDraw' => $userSelectionRq
                        ];
                    }
                }
            }
            elseif (!empty($data['gridEuromillions']['userBallsSelection']) && empty($data['gridEuromillions']['userStarsSelection']))
            {

//            Création du tableau contenant
//            les boules choisies par l'utilisateur

                $userBalls = $data['gridEuromillions']['userBallsSelection'];
                $userSelection['userBalls'] = $userBalls;

//            requete de tous les tirages avec au moins
//            une boule commune avec la sélection utilisateur.

                $userSelectionRequest = $repository->findDrawsByUserBallsSelection($userBalls);

                foreach ($userSelectionRequest as $userSelectionRq) {
                    $userResultsDrawId = 'draw_' . $userSelectionRq->getId();
                    $ballsRq = $userSelectionRq->getBallsArray();
                    $userCommonBallsArray = array_intersect($userBalls, $ballsRq);
                    $unsortedUserResults[$userResultsDrawId] = [
                        'userCommonBallsArray' => $userCommonBallsArray,
                        'completeDraw' => $userSelectionRq
                    ];
                }
            }
            elseif (empty($data['gridEuromillions']['userBallsSelection']) && !empty($data['gridEuromillions']['userStarsSelection']))
            {

//            Création du tableau contenant
//            les étoiles choisies par l'utilisateur

                $userStars = $data['gridEuromillions']['userStarsSelection'];
                $userSelection['userStars'] = $userStars;

//            requete de tous les tirages avec au moins
//            une étoile commune avec la sélection utilisateur.

                $userSelectionRequest = $repository->findDrawsByUserStarsSelection($userStars);

                foreach ($userSelectionRequest as $userSelectionRq) {
                    $userResultsDrawId = 'draw_' . $userSelectionRq->getId();
                    $starsRq = $userSelectionRq->getStarsArray();
                    $userCommonStarsArray = array_intersect($userStars, $starsRq);
                    $userResultsOnlyStar[$userResultsDrawId] = [
                        'userCommonStarsArray' => $userCommonStarsArray,
                        'completeDraw' => $userSelectionRq
                    ];
                }
            }

//            Création du tableau $userResults qui contient tous les tirages
//            gagnants de la sélection utilisateur triés par nombre de
//            numéros gagnants.

            if (isset($unsortedUserResults)) {
                foreach ($unsortedUserResults as $unsortedUserResult) {
                    $countCommonBallsArray = count($unsortedUserResult['userCommonBallsArray']);
                    if (isset($unsortedUserResult['userCommonStarsArray'])) {
                        $countCommonStarsArray = count($unsortedUserResult['userCommonStarsArray']);
                    }
                    if ($countCommonBallsArray == 5) {
                        if (isset($unsortedUserResult['userCommonStarsArray'])) {
                            if ($countCommonStarsArray == 2) {
                                $userResults_5_2_balls['draw_' . $unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            } elseif ($countCommonStarsArray == 1) {
                                $userResults_5_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            }
                        } else {
                            $userResults_5_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    } elseif ($countCommonBallsArray == 4) {
                        if (isset($unsortedUserResult['userCommonStarsArray'])) {
                            if ($countCommonStarsArray == 2) {
                                $userResults_4_2_balls['draw_' . $unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            } elseif ($countCommonStarsArray == 1) {
                                $userResults_4_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            }
                        } else {
                            $userResults_4_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    } elseif ($countCommonBallsArray == 3) {
                        if (isset($unsortedUserResult['userCommonStarsArray'])) {
                            if ($countCommonStarsArray == 2) {
                                $userResults_3_2_balls['draw_' . $unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            } elseif ($countCommonStarsArray == 1) {
                                $userResults_3_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            }
                        } else {
                            $userResults_3_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    } elseif ($countCommonBallsArray == 2) {
                        if (isset($unsortedUserResult['userCommonStarsArray'])) {
                            if ($countCommonStarsArray == 2) {
                                $userResults_2_2_balls['draw_' . $unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            } elseif ($countCommonStarsArray == 1) {
                                $userResults_2_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            }
                        } else {
                            $userResults_2_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    } elseif ($countCommonBallsArray == 1) {
                        if (isset($unsortedUserResult['userCommonStarsArray'])) {
                            if ($countCommonStarsArray == 2) {
                                $userResults_1_2_balls['draw_' . $unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            } elseif ($countCommonStarsArray == 1) {
                                $userResults_1_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                            }
                        } else {
                            $userResults_1_balls['draw_'.$unsortedUserResult['completeDraw']->getId()] = $unsortedUserResult;
                        }
                    }
                }

                if (isset($userResults_5_2_balls)) {
                    $userResults['userResults_5_2_balls'] = $userResults_5_2_balls;
                }
                if (isset($userResults_5_1_balls)) {
                    $userResults['userResults_5_1_balls'] = $userResults_5_1_balls;
                }
                if (isset($userResults_5_balls)) {
                    $userResults['userResults_5_balls'] = $userResults_5_balls;
                }
                if (isset($userResults_4_2_balls)) {
                    $userResults['userResults_4_2_balls'] = $userResults_4_2_balls;
                }
                if (isset($userResults_4_1_balls)) {
                    $userResults['userResults_4_1_balls'] = $userResults_4_1_balls;
                }
                if (isset($userResults_4_balls)) {
                    $userResults['userResults_4_balls'] = $userResults_4_balls;
                }
                if (isset($userResults_3_2_balls)) {
                    $userResults['userResults_3_2_balls'] = $userResults_3_2_balls;
                }
                if (isset($userResults_3_1_balls)) {
                    $userResults['userResults_3_1_balls'] = $userResults_3_1_balls;
                }
                if (isset($userResults_3_balls)) {
                    $userResults['userResults_3_balls'] = $userResults_3_balls;
                }
                if (isset($userResults_2_2_balls)) {
                    $userResults['userResults_2_2_balls'] = $userResults_2_2_balls;
                }
                if (isset($userResults_2_1_balls)) {
                    $userResults['userResults_2_1_balls'] = $userResults_2_1_balls;
                }
                if (isset($userResults_2_balls)) {
                    $userResults['userResults_2_balls'] = $userResults_2_balls;
                }
                if (isset($userResults_1_2_balls)) {
                    $userResults['userResults_1_2_balls'] = $userResults_1_2_balls;
                }
                if (isset($userResults_1_1_balls)) {
                    $userResults['userResults_1_1_balls'] = $userResults_1_1_balls;
                }
                if (isset($userResults_1_balls)) {
                    $userResults['userResults_1_balls'] = $userResults_1_balls;
                }
            }
            if (isset($userResultsOnlyStar)) {
                foreach ($userResultsOnlyStar as $userResultOnlyStar) {
                    $countCommonStarsArray = count($userResultOnlyStar['userCommonStarsArray']);
                    if ($countCommonStarsArray == 2) {
                        $userResults_2_Stars['draw_'.$userResultOnlyStar['completeDraw']->getId()] = $userResultOnlyStar;
                    } else {
                        $userResults_1_Stars['draw_'.$userResultOnlyStar['completeDraw']->getId()] = $userResultOnlyStar;
                    }
                }
                if (isset($userResults_2_Stars)) {
                    $userResults['userResults_2_stars'] = $userResults_2_Stars;
                }
                if (isset($userResults_1_Stars)) {
                    $userResults['userResults_1_stars'] = $userResults_1_Stars;
                }
            }

            $userSelectionResults = $userResults;

            return $this->render('pages/grid_euromillions/result_user_grid_euromillions.html.twig', [
                'userSelection' => $userSelection,
                'userSelectionResults' => $userSelectionResults,
            ]);
        }

        return $this->render('pages/grid_euromillions/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
